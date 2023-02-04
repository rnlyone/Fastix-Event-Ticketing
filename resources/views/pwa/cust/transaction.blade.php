@include('pwa.layouts.header', ['title' => ': Transaksi', 'pagetitle' => 'Transaksi', 'customcss' => ''])

<div class="page-content">
    <div id="tab-group-1">
        <div class="card card-style bg-theme pb-0">
            <div class="content mb-0 mx-0 my-0">
                <div class="tab-controls tabs-small" data-highlight="bg-highlight">
                    <a href="#" data-active data-bs-toggle="collapse" data-bs-target="#tab-1">Pending</a>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-2">Selesai</a>
                </div>
            </div>
        </div>
        <div data-bs-parent="#tab-group-1" class="collapse show" id="tab-1">
            <div class="card card-style p-3">
                @foreach ($pendingorders as $order)
                <a href="{{route('cust.checkout', ['uuid' => $order->uuid])}}"  class="d-flex">
                    <div class="align-self-center">
                        <span class="icon icon-s gradient-yellow color-white rounded-sm shadow-xxl"><i class="fab fa-spotify font-20"></i></span>
                    </div>
                    <div class="align-self-center">
                        <h5 class="ps-3 mb-n1 font-15">Event</h5>
                        <span class="ps-3 mb-n1 font-11 color-theme opacity-70">{{$order->details->count()}} Jenis Tiket</span>
                    </div>
                    <div class="ms-auto text-end align-self-center">
                        <h5 class="color-theme font-15 font-700 d-block mb-n1">Rp. {{number_format($order->jumlah_bayar, 0, ',', ',')}}</h5>
                        <span class="color-yellow font-11">{{$order->created_at}}
                    </div>
                </a>
                <div class="divider my-3"></div>
                @endforeach
                <p class="text-center font-11 opacity-50 mb-0">Tap any Bill to See the Invoice File</p>
            </div>
        </div>
        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-2">
            <div class="card card-style p-3">
                @foreach ($orders as $order)
                <a href="{{route('cust.checkout', ['uuid' => $order->uuid])}}" class="d-flex">
                    <div class="align-self-center">
                        <span class="icon icon-s gradient-green color-white rounded-sm shadow-xxl"><i class="fab fa-spotify font-20"></i></span>
                    </div>
                    <div class="align-self-center">
                        <h5 class="ps-3 mb-n1 font-15">Event</h5>
                        <span class="ps-3 mb-n1 font-11 color-theme opacity-70">{{$order->details->count()}} Jenis Tiket | </span>
                        @if ($order->status_bayar == "sukses")
                            <span class="badge font-10 bg-success">Selesai</span></span>
                        @else
                            <span class="badge font-10 bg-danger">Dibatalkan</span></span>
                        @endif
                    </div>
                    <div class="ms-auto text-end align-self-center">
                        <h5 class="color-theme font-15 font-700 d-block mb-n1">Rp. {{number_format($order->jumlah_bayar, 0, ',', ',')}}</h5>
                        <span class="color-green-dark font-11">{{$order->created_at}}</span>
                    </div>
                </a>
                <div class="divider my-3"></div>
                @endforeach
                <p class="text-center font-11 opacity-50 mb-0">Tap any Bill to See the Invoice File</p>
            </div>
        </div>
    </div>
</div>

@include('pwa.layouts.toaster')
@include('pwa.layouts.footer')
