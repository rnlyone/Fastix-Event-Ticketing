<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Riwayat;
use App\Models\Ticket;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class CustomerController extends Controller
{
    public function custIndex()
    {
        $riwayatscan = Riwayat::where('id_cust', auth()->user()->id)
        ->whereHas('event', function($query){
          $query->where('visibility', 1);
        })
        ->get();

        return view('pwa.cust.welcome', ['riwayat' => 'active-nav', 'riwayatscan' => $riwayatscan]);
    }

    public function custProfile()
    {
        $userdata = User::find(auth()->user()->id);
        try {
            $custdata = Customer::where('id_user', $userdata->id)->first();
        } catch (\Throwable $th) {
            $custdata = NULL;
        }
        return view('pwa.cust.profile', ['profile' => 'active-nav', 'userdata' => $userdata, 'custdata' => $custdata]);
    }

    public function custTicket()
    {
        date_default_timezone_set('Asia/Makassar');

        $tikets = OrderDetail::where('order_details.id_cust', auth()->user()->id)
            ->join('tickets', 'tickets.id', '=', 'order_details.id_tiket')
            ->join('events', 'events.id', '=', 'tickets.id_event')
            ->where('events.selesai_event', '>', date('Y-m-d H:i:s'))
            ->join('orders', 'orders.id', '=', 'order_details.id_order')
            ->where('orders.status_bayar', '=', 'sukses')
            ->get();

        return view('pwa.cust.ticket', [
            'ticket' => 'active-nav',
            'tickets' => $tikets,
        ]);
    }

    public function custDetailTicket($order, $detail)
    {

        $ord = Order::where('uuid', $order)->first();
        $det = OrderDetail::find($detail);
        // dd($ord->id, $det->id_order);
            $tixes = $det->paidtix;
            return view('pwa.cust.redeemticket', [
                'ticket' => 'active-nav',
                'order' => $ord,
                'detail' => $det,
                'tixes' => $tixes
            ]);
    }

    public function custScan()
    {
        return view('pwa.cust.scanqr', ['scan' => 'active-nav']);
    }

    public function scan(Request $request)
    {
        $event = Event::where('uuid', $request->id_event)->where('visibility', 1)->first();

        if ($event != NULL) {
            return redirect()->route('cust.event', ['uuid' => $event->uuid]);
        } else {
            return back()->with('gagal', 'Event Tidak Ada');
        }

        $riwayat = Riwayat::where('id_cust', Auth::guard('cust')->user()->id)
                            ->where('id_event', $event->id)->first();
        if (!$riwayat) {
            // add to riwayat if not exists
            $riwayat = new Riwayat();
            $riwayat->id_cust = Auth::guard('cust')->user()->id;
            $riwayat->id_event = $event->id;
            $riwayat->save();
        }


    }

    public function custEvent($uuid)
    {
        $event = Event::where('uuid', $uuid)->first();

        $tickets = Ticket::where('id_event', $event->id)->get();

        $adminfee = 5500;

        return view('pwa.cust.event', [
            'scan' => 'active-nav',
            'eventdetail' => $event,
        'tickets' => $tickets,
            'adminfee' => $adminfee
        ]);
    }

    public function custTransaction()
    {
        $orders = Order::where('id_cust', auth()->user()->id)->latest()->get();
        $orderdetails = OrderDetail::where('id_cust', auth()->user()->id)->latest()->get();

        return view('pwa.cust.transaction',
            ['transaksi' => 'active-nav',
             'orders' => $orders->whereIn('status_bayar', ['gagal', 'sukses']),
             'orderdetails' => $orderdetails,
             'pendingorders' => $orders->where('status_bayar', 'pending'),
            ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = Customer::firstOrNew(['id_user' => auth()->user()->id]);
        $customer->nama_lengkap = $request['nama_lengkap'];
        $customer->jk = $request['jk'];
        $customer->tgl_lahir = $request['tgl_lahir'];
        $customer->save();

        return back()->with('sukses', 'Berhasil Simpan');
    }

    public function newupdate(Request $request)
    {
        $customer = Customer::firstOrNew(['id_user' => auth()->user()->id]);
        $customer->nama_lengkap = $request->nama_lengkap;
        $customer->jk = $request->jk;
        $customer->tgl_lahir = $request->tgl_lahir;
        $customer->save();

        return back()->with('sukses', 'Berhasil Simpan');
    }

    public function newupdateimg(Request $request)
    {
        // Validate file size and aspect ratio
        $validatedData = $request->validate([
            'profile_pict' => 'required|image|dimensions:ratio=1/1|max:2048',
        ]);

        // If validation passes, store the file
        $file = $request->file('profile_pict');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile_pict', $fileName);

        // Update the user's profile picture
        $user = User::find(auth()->user()->id);
        $user->profile_pict = $fileName;
        $user->save();

        return redirect()->back()->with('success', 'Foto profile berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
