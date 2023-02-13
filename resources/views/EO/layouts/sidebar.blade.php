<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)">
            <i data-feather="settings"></i>
        </a>
        <img class="img-90 rounded-circle" src="/assets/images/dashboard/1.png" alt="">
        <div class="badge-bottom">
            <span class="badge badge-primary">New</span>
        </div>
        <a href="/theme/user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{auth()->user()->eo->name_eo ?? 'EO'}}</h6>
        </a>
        <p class="mb-0 font-roboto">{{auth()->user()->username}}</p>
        <ul>
            <li>
                <span>
                    <span class="counter">{{auth()->user()->events->count()}}</span>

                </span>
                <p>Events</p>
            </li>
            <li>
                @php
                    $events =  auth()->user()->events;
                    $jumlahorder = 0;
                    foreach ($events as $e => $event) {
                        $tickets = $event->tickets;
                        foreach ($tickets as $t => $ticket) {
                            $jumlahorder = $jumlahorder + $ticket->orderdetails->count();
                        }
                    }
                @endphp
                <span>{{$jumlahorder}} Tickets </span>
                <p>Sold</p>
            </li>
            <li>
                <span>
                    <span class="counter">95.2</span>
                    k
                </span>
                <p>Follower </p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$dashboardac ?? ''}}" href="{{route('EO')}}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$eventsayaac ?? ''}}" href="{{route('event.index')}}">
                            <i data-feather="youtube"></i>
                            <span>Event Saya</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$transaksiac ?? ''}}" href="/theme/jsgrid-table.html">
                            <i data-feather="briefcase"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$payoutsac ?? ''}}" href="/theme/jsgrid-table.html">
                            <i data-feather="dollar-sign"></i>
                            <span>Payouts</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pengaturan             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$profileac ?? ''}}" href="#">
                            <i data-feather="user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="#">
                            <i data-feather="log-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </nav>
</header>
