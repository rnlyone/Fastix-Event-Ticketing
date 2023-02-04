@include('pwa.layouts.header', ['title' => ': Riwayat Tiket', 'pagetitle' => 'FASTIX', 'customcss' => ''])
        <div class="page-content">
            {{-- <div class="card card-style s card-full-left bg-17" data-card-height="230">
                <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
                    <div class="card-center text-center">
                        <h1 class="font-30 text-uppercase font-900 opacity-30">Fri</h1>
                        <h1 class="font-24 font-900">15th</h1>
                    </div>
                </div>
                <div class="card-top ps-5 ms-5 pt-3">
                    <div class="ps-4">
                        <h1 class="color-white pt-3 pb-3">Apple Event </h1>
                        <p class="color-white mb-0"><i class="fa fa-mobile color-white pe-2 icon-30"></i> Bench Pressing
                            and Squats</p>
                        <p class="color-white"><i class="fa fa-map-marker color-white pe-2 icon-30"></i> Steve Jobs
                            Theater, Palo Alto</p>
                        <a href="#" data-menu="menu-join" class="btn btn-m bg-white color-black font-700">Accept</a>
                        <a href="#" data-menu="menu-join"
                            class="btn btn-m border-white color-white font-700 ms-3">Decline</a>
                    </div>
                </div>
                <div class="card-overlay bg-black opacity-70"></div>
            </div> --}}
            @foreach ($riwayatscan as $rs)
                <div class="card card-style">
                    <div class="card mb-0 rounded-0" style="background-image : url({{$rs->event->img_url}})" data-card-height="250">
                        <div class="card-bottom">
                            <a href="{{route('cust.event', ['uuid' => $rs->event->uuid])}}"
                                class="float-end btn btn-m font-700 bg-white rounded-s color-black mb-2 me-2">Detail Event</a>
                        </div>
                    </div>
                    <div class="content">
                        @php
                            setlocale(LC_TIME, 'id_ID.utf8');
                            $formattedDate = strftime("%A, %d %B %Y", strtotime($rs->event->mulai_event));

                            $start_date = date('d F Y H:i', strtotime($rs->event->mulai_event));
                            $end_date = date('d F Y H:i', strtotime($rs->event->selesai_event));
                            $range = $start_date . ' s/d ' . $end_date;
                        @endphp
                        <p class="font-600 color-highlight mb-n1">{{$formattedDate}}</p>
                        <h1 class="font-30 font-800">{{$rs->event->nama_event}}</h1>
                        <p class="font-14 mb-3">
                            {{$rs->event->sinopsis}}
                        </p>
                        <p class="opacity-50">
                            <i class="fa icon-30 text-center fa-star pe-2"></i>Rated 4.9 <span
                                class="badge bg-transparent border border-red-dark color-red-dark ms-2">PREMIUM</span><br>
                            <i class="fa icon-30 text-center fa-map-marker pe-2"></i> {{$rs->event->lokasi}} <br>
                            <i class="fa icon-30 text-center fa-calendar pe-2"></i>{{$range}}
                        </p>
                        @php
                            $tickets = $rs->event->tickets;

                            $sum = 0;
                            foreach ($tickets as $i => $tic) {
                                $orderdetails = $tic->orderdetails;
                                foreach ($orderdetails as $j => $orderdetail) {
                                    $sum = $sum + $orderdetail->jumlah;
                                }
                            }
                        @endphp
                        <span class="pt-3 ps-2 font-700">{{$sum}} Telah Terjual</span>
                    </div>
                </div>
            @endforeach
            <div data-menu-load="{{route('menufooter')}}"></div>

            @include('pwa.layouts.toaster')
        </div>

@include('pwa.layouts.footer')
