@include('pwa.layouts.header', ['title' => ': Invoice', 'pagetitle' => 'Invoice', 'customcss' => ''])

<div class="page-content">
    <div class="card card-style">
        <div class="content">
            <div class="d-flex">
                <div class="mt-1">
                    <p class="color-highlight font-600 mb-n1">Tiket Event</p>
                    <h1>Bayar Tiket</h1>
                </div>
                <div class="ms-auto">
                    <span class="icon icon-s gradient-yellow color-white rounded-sm shadow-xxl"><i
                            class="fa fa-ticket font-20"></i></span>
                </div>
            </div>
            <div class="row mb-0 mt-4">
                <h5 class="col-4 text-start font-15">Invoice</h5>
                <h5 class="col-8 text-end font-14 opacity-60 font-400">#{{$order->id}}</h5>
                <h5 class="col-4 text-start font-15">Bill To</h5>
                <h5 class="col-8 text-end font-14 opacity-60 font-400">
                    {{auth()->user()->customer->nama_lengkap ?? 'User'}}</h5>
                <h5 class="col-4 text-start font-15">Date</h5>
                <h5 class="col-8 text-end font-14 opacity-60 font-400">{{$order->created_at}}</h5>
                <h5 class="col-4 text-start font-15">Status</h5>
                <h5 class="col-8 text-end font-14 opacity-60 font-400 pb-4">{{$order->status_bayar}}</h5>
            </div>
            <div class="divider"></div>
            @foreach ($order->details as $detail)
            <div class="d-flex mb-3">
                <div>
                    <img src="{{$detail->ticket->event->img_url}}" style="
                        border-radius: 12px;
                        height: 32px !important;
                        line-height: 32px !important;
                        width: 32px !important;
                        margin-left: 5px !important;
                        box-shadow: 0 5px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.02);">
                </div>
                <div class="ps-3 w-100">
                    <p class="mb-0 color-highlight">{{$detail->jumlah}}x Item</p>
                    <h1>Rp. {{number_format($detail->ticket->harga * $detail->jumlah)}} </h1>
                    <h5 class="font-500">{{$detail->ticket->nama_tiket}} ({{$detail->ticket->event->nama_event}})</h5>
                </div>
            </div>
            @endforeach
            <div class="divider mt-4"></div>
            <div class="d-flex mb-3">
                <div>
                    <h5 class="opacity-50 font-500">Admin</h5>
                </div>
                <div class="ms-auto">
                    <h5>Rp. {{number_format($adminfee)}} </h5>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div>
                    <h3 class="font-700">Grand Total</h3>
                </div>
                <div class="ms-auto">
                    <h3>Rp. {{number_format($order->jumlah_bayar)}} </h3>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
</div>

@include('pwa.layouts.footer')
