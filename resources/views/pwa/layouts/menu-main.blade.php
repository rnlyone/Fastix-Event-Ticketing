<div class="card rounded-0 bg-6" data-card-height="150" style="height: 150px;">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i
                class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28">FASTIX</h1>
        <p class="mb-2 ps-3 font-12 color-white opacity-50">Solusi Tepat, Tiket Cepat</p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<h6 class="menu-divider">Menu</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-scan" href="{{route('cust.scan')}}" class="{{$scan ?? ''}}">
        <i class="fa fa-qrcode gradient-red color-white" ></i>
        <span>Scan</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-Riwayat" href="/" class="{{$riwayat ?? ''}}">
        <i class="fa fa-home gradient-green color-white"></i>
        <span>Riwayat</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-Transaksi" href="{{route('cust.transaction')}}" class="{{$transaksi ?? ''}}">
        <i class="fa fa-money-check-alt gradient-blue color-white"></i>
        <span>Transaksi</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-Tiket" href="{{route('cust.ticket')}}" class="{{$ticket ?? ''}}">
        <i class="fa fa-ticket gradient-brown color-white"></i>
        <span>Tiket</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-Profile" href="{{route('cust.profile')}}" class="{{$profile ?? ''}}">
        <i class="fa fa-person gradient-magenta color-white"></i>
        <span>Profile</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider mt-4">settings</h6>
<div class="list-group list-custom-small list-menu">
    <a href="#" data-menu="menu-colors">
        <i class="fa fa-brush gradient-highlight color-white"></i>
        <span>Highlights</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode">
        <i class="fa fa-moon gradient-dark color-white"></i>
        <span>Dark Mode</span>
        <div class="custom-control small-switch ios-switch">
            <input data-toggle-theme="" type="checkbox" class="ios-input" id="toggle-dark-menu">
            <label class="custom-control-label" for="toggle-dark-menu"></label>
        </div>
    </a>
    <a id="nav-logout" href="{{route('logout')}}">
        <i class="fa fa-envelope gradient-teal color-white"></i>
        <span>Logout</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider font-10 mt-4">Made with <i class="fa fa-heart color-red-dark pl-1 pr-1"></i> by Fasitx
    <span class="copyright-year">2023</span></h6>
