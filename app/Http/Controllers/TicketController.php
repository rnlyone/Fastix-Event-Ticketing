<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'nama_tiket' => 'required|string',
            'harga' => 'required|integer',
            'kuota' => 'required|integer',
        ]);

        $event = Event::where('uuid', $uuid)->first();

        $ticket = new Ticket;
        $ticket->id_event = $event->id;
        $ticket->nama_tiket = $request->input('nama_tiket');
        $ticket->harga = $request->input('harga');
        $ticket->kuota = $request->input('kuota');
        $ticket->save();

        return back()->with('sukses', 'Tiket berhasil ditambahkan');
    }

    public function newupdate(Request $request, $uuidtix)
    {
        $validatedData = $request->validate([
            'nama_tiket' => 'required|string',
            'harga' => 'required|integer',
            'kuota' => 'required|integer',
        ]);

        $ticket = Ticket::find(Crypt::decryptString($uuidtix));
        $ticket->nama_tiket = $request->input('nama_tiket');
        $ticket->harga = $request->input('harga');
        $ticket->kuota = $request->input('kuota');
        $ticket->save();
        return back()->with('sukses', 'Ticket berhasil diupdate');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
