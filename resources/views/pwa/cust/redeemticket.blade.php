@include('pwa.layouts.header', ['title' => ': Profil Saya', 'pagetitle' => 'Profil Saya', 'customcss' => ''])

<div class="card card-style s card-full-left bg-17" data-card-height="230">
    <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
        <div class="card-center text-center">
            <h6 class="font-24 text-uppercase font-900 opacity-30">Detail</h6>
            <h4 class="font-20 font-900">Ticket</h4>
        </div>
    </div>
    <div class="card-top ps-5 ms-5 pt-3">
        <div class="ps-4">
            <h1 class="color-white pt-3 pb-3">{{$detail->ticket->event->nama_event}}</h1>
            <p class="color-white mb-0"><i class="fa fa-mobile color-white pe-2 icon-30"></i>{{$detail->ticket->nama_tiket}}</p>
            <p class="color-white mb-0"><i class="fa fa-map-marker color-white pe-2 icon-30"></i>{{$detail->jumlah}} Tiket</p>
            <p class="color-white mb-0"><i class="fa fa-map-marker color-white pe-2 icon-30"></i>{{$detail->ticket->event->mulai_event}}</p>
        </div>
    </div>
    <div class="card-overlay bg-black opacity-70"></div>
</div>

<div class="page-content">
    @foreach ($tixes as $tix)
    <div class="card card-style">
        <div class="text-center pt-4 pb-4">
            <h1>Scan TIKET #TIX{{$tix->id}}</h1>
            <p class="boxed-text-xl">
                QR Code yang tampil pada tiket Anda harus discan oleh penyelenggara event sebelum Anda memasuki acara. Ini adalah langkah penting untuk memastikan bahwa tiket Anda sah dan Anda bisa memasuki acara tanpa masalah. Mohon pastikan bahwa QR Code Anda jelas terlihat dan mudah discan sebelum memasuki acara.
            </p>
            @if ($tix->status_tiket == 0)
                <div href="#" class="chip chip-s bg-green-dark">
                    <i class="fa fa-check color-white bg-green-light"></i>
                    <span class="color-white">Belum Terpakai</span>
                </div>
            @else
                <div href="#" class="chip chip-s bg-red-dark">
                    <i class="fa fa-times color-white bg-red-light"></i>
                    <span class="color-white">Sudah Terpakai</span>
                </div>
            @endif
            <img width="250" class="mx-auto polaroid-effect shadow-l mb-3" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{$tix->token}}">
            <p class="text-center font-10 pt-2 mb-0">{{$tix->token}}</p>
        </div>
    </div>
@endforeach
</div>

@include('pwa.layouts.footer')

