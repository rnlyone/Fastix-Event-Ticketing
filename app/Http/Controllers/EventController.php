<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Paidtix;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #page information
        $pagetitle = 'Event Saya';
        $breadcrumb = [['Event Saya', route('event.index')]];

        $events = Event::where('id_eo', auth()->user()->id)->where('soft_delete', 0)->get();
        return view('EO.events.index', [
            'events' => $events,
            'pagetitle' => $pagetitle,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function EOEvent($uuid)
    {
        #page information
        $pagetitle = 'Detail Event';


        $event = Event::where('uuid', $uuid)->first();

        $tickets = Ticket::where('id_event', $event->id)->get();

        $breadcrumb = [['Event Saya', route('event.index')], [$event->nama_event, route('event.detail', [$uuid])]];

        return view('EO.events.details', [
            'pagetitle' => $pagetitle,
            'breadcrumb' => $breadcrumb,
            'scan' => 'active-nav',
            'eventdetail' => $event,
            'tickets' => $tickets,
        ]);
    }

    public function EOattend($uuid)
    {
        $tix = session()->get('tix') ?? NULL;
        #page information
        $pagetitle = 'Attendance Event';
        $event = Event::where('uuid', $uuid)->first();

        $breadcrumb = [
            ['Event Saya', route('event.index')],
            [$event->nama_event, route('event.detail', [$uuid])],
            ['Attendance', route('event.attend', [$uuid])]
        ];

        $event = Event::where('uuid', $uuid)->first();
        $paidtix = Paidtix::get();
        $paidtix = $paidtix->filter(function ($item) use ($event) {
        return $item->orderdetail->ticket->id_event == $event->id;
        });


        return view('EO.events.tickets.scantix', [
            'pagetitle' => $pagetitle,
            'breadcrumb' => $breadcrumb,
            'scan' => 'active-nav',
            'eventdetail' => $event,
            'paidtixes' => $paidtix,
            'tix' => $tix
        ]);
    }

    public function EOscan(Request $request)
    {

        try {
            $tix = Paidtix::where('token', $request->id_token)->first();

            if($tix->orderdetail->ticket->event->id == $request->id_event){
                if($tix->status_tiket == 0){
                    $tix->status_tiket = 1;
                    $tix->save();
                    return redirect()->route('event.attend',['uuid' => $tix->orderdetail->ticket->event->uuid])->with(['tix' => $tix, 'sukses' => 'Tiket Sukses Digunakan']);
                }else{
                    return redirect()->route('event.attend',['uuid' => $tix->orderdetail->ticket->event->uuid])->with(['tix' => $tix, 'gagal' => 'tiket Sudah Digunakan Sebelumnya']);
                }
            } else{
                return redirect()->route('event.attend',['uuid' => $tix->orderdetail->ticket->event->uuid])->with(['tix' => $tix, 'gagal' => 'tiket bukan untuk event ini']);
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with(['tix' => $tix, 'gagal' => 'Tiket Tidak Ada']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required',
            'lokasi' => 'required',
            'max_buy' => 'required|numeric',
            'buka_regis' => 'required',
            'tutup_regis' => 'required',
            'mulai_event' => 'required',
            'selesai_event' => 'required',
            'img_url' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // validasi tanggal
        $validator->after(function ($validator) use ($request) {
            $buka_regis = strtotime($request->buka_regis);
            $tutup_regis = strtotime($request->tutup_regis);
            $mulai_event = strtotime($request->mulai_event);
            $selesai_event = strtotime($request->selesai_event);

            if ($buka_regis >= $tutup_regis) {
                $validator->errors()->add('buka_regis', 'Buka registrasi harus sebelum tutup registrasi');
            }
            if ($tutup_regis >= $mulai_event) {
                $validator->errors()->add('tutup_regis', 'Tutup registrasi harus sebelum mulai event');
            }
            if ($mulai_event >= $selesai_event) {
                $validator->errors()->add('mulai_event', 'Mulai event harus sebelum selesai event');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event = new Event;
        $event->uuid = Str::uuid();
        $event->id_eo = auth()->user()->id;
        $event->nama_event = $request->nama_event;
        $event->sinopsis = $request->sinopsis;
        $event->deskripsi = $request->deskripsi;
        $event->lokasi = $request->lokasi;
        $event->max_buy = $request->max_buy;
        $event->buka_regis = $request->buka_regis;
        $event->tutup_regis = $request->tutup_regis;
        $event->mulai_event = $request->mulai_event;
        $event->selesai_event = $request->selesai_event;
        $event->visibility = $request->visibility;
        $event->soft_delete = 0;

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/img_url_event', $name);
            $event->img_url = $name;
        }

        $event->save();

        return redirect()->route('event.detail', ['uuid' => $event->uuid])->with('sukses', 'Data event berhasil diupdate.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    public function newupdate(Request $request, $uuid)
    {
        $id = Event::where('uuid', $uuid)->first()->id;
        $event = Event::findOrFail($id);

        // validasi input
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required',
            'lokasi' => 'required',
            'max_buy' => 'required|numeric',
            'buka_regis' => 'required',
            'tutup_regis' => 'required',
            'mulai_event' => 'required',
            'selesai_event' => 'required',
            'img_url' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // validasi tanggal
        $validator->after(function ($validator) use ($request) {
            $buka_regis = strtotime($request->buka_regis);
            $tutup_regis = strtotime($request->tutup_regis);
            $mulai_event = strtotime($request->mulai_event);
            $selesai_event = strtotime($request->selesai_event);

            if ($buka_regis >= $tutup_regis) {
                $validator->errors()->add('buka_regis', 'Buka registrasi harus sebelum tutup registrasi');
            }
            if ($tutup_regis >= $mulai_event) {
                $validator->errors()->add('tutup_regis', 'Tutup registrasi harus sebelum mulai event');
            }
            if ($mulai_event >= $selesai_event) {
                $validator->errors()->add('mulai_event', 'Mulai event harus sebelum selesai event');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event = Event::where('uuid', $uuid)->first();
        $event->nama_event = $request->nama_event;
        $event->lokasi = $request->lokasi;
        $event->max_buy = $request->max_buy;
        $event->buka_regis = $request->buka_regis;
        $event->tutup_regis = $request->tutup_regis;
        $event->mulai_event = $request->mulai_event;
        $event->selesai_event = $request->selesai_event;
        $event->visibility = $request->visibility;

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/img_url_event', $name);
            $event->img_url = $name;
        }

        $event->save();

        return redirect()->route('event.detail', ['uuid' => $event->uuid])->with('sukses', 'Data event berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->visibility = 0;
        $event->soft_delete = 1;
        $event->save();
    }
}
