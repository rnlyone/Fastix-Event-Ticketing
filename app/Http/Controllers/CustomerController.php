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
use Psy\Readline\Hoa\Console;

class CustomerController extends Controller
{
    public function custIndex()
    {
        $riwayatscan = Riwayat::where('id_cust', auth()->user()->id)->get();

        return view('pwa.cust.welcome', ['riwayat' => 'active-nav', 'riwayatscan' => $riwayatscan]);
    }

    public function custProfile()
    {
        $userdata = User::find(auth()->user()->id);
        return view('pwa.cust.profile', ['profile' => 'active-nav', 'userdata' => $userdata]);
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
        $event = Event::where('uuid', $request->id_event)->first();

        if ($event != NULL) {
            return redirect()->route('cust.event', ['uuid' => $event->uuid]);
        } else {
            return back()->with('gagal', 'Event Tidak Ada');
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
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
