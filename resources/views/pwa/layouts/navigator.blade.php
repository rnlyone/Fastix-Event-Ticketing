<div id="footer-bar" class="footer-bar-6">
    <a href="/" class="{{$riwayat ?? ''}}"><i class="fa fa-home"></i><span>Riwayat</span></a>
    <a href="{{route('cust.transaction')}}" class="{{$transaksi ?? ''}}"><i class="fa fa-money-check-alt"></i><span>Transaksi</span></a>
    <a href="{{route('cust.scan')}}" class="circle-nav {{$scan ?? ''}}"><i class="fa fa-qrcode"></i><span>Scan</span></a>
    <a href="{{route('cust.ticket')}}" class="{{$ticket ?? ''}}"><i class="fa fa-ticket"></i><span>My Ticket</span></a>

        @if (Auth::check())
            <a href="{{route('cust.profile')}}" class="{{$profile ?? ''}}"><img src="{{auth()->user()->profile_pict}}" class="rounded-xl mb-2" width="17"><span>Profil</span></a>
        @else
            <a href="{{route('flogin')}}" class="{{$login ?? ''}}"><i class="fa fa-user"></i><span>Masuk</span></a>
        @endif
</div>
