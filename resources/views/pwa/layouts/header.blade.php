@include('pwa.layouts.app', ['title' => $title, 'customcss' => $customcss])

<body class="theme-light">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="/" class="header-title">{{$pagetitle}}</a>

            @if ($title == ': Riwayat Tiket' || ': Profil Saya')
                <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>

                <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i
                        class="fas fa-sun"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i
                        class="fas fa-moon"></i></a>
            @else
                <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
                <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
            @endif

        </div>
        @include('pwa.layouts.navigator')
        <div class="page-title page-title-fixed">
            <h1>{{$pagetitle}}</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i
                    class="fa fa-moon"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i
                    class="fa fa-lightbulb color-yellow-dark"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i
                    class="fa fa-bars"></i></a>
        </div>
        <div class="page-title-clear"></div>
