@include('pwa.layouts.header', ['title' => ': Tiket', 'pagetitle' => 'Tiket', 'customcss' => ''])
<div class="page-content">
    @foreach ($tickets as $tix)
        @php
            $createdAt = new DateTime($tix->ticket->event->mulai_event);
                    // Hari dengan 3 huruf
                    $day = $createdAt->format('D');
                    switch($day) {
                    case 'Mon':
                    $day = 'Mon';
                    break;
                    case 'Tue':
                    $day = 'Tue';
                    break;
                    case 'Wed':
                    $day = 'Wed';
                    break;
                    case 'Thu':
                    $day = 'Thu';
                    break;
                    case 'Fri':
                    $day = 'Fri';
                    break;
                    case 'Sat':
                    $day = 'Sat';
                    break;
                    case 'Sun':
                    $day = 'Sun';
                    break;
                }
            // Tanggal dengan format "15th"
            $date = $createdAt->format('jS');
        @endphp
        <a href="{{route('cust.detailticket', ['order' => $tix->order->uuid, 'detail' => $tix->id])}}" class="card card-style s card-full-left bg-17" data-card-height="230">
            <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
                <div class="card-center text-center">
                    <h1 class="font-30 text-uppercase font-900 opacity-30">{{$day}}</h1>
                    <h1 class="font-24 font-900">{{$date}}</h1>
                </div>
            </div>
            <div class="card-top ps-5 ms-5 pt-3">
                <div class="ps-4">
                    <h1 class="color-white pt-3 pb-3">{{$tix->ticket->event->nama_event}}</h1>
                    <p class="color-white mb-0"><i class="fa fa-mobile color-white pe-2 icon-30"></i>{{$tix->ticket->nama_tiket}}</p>
                    <p class="color-white mb-0"><i class="fa fa-map-marker color-white pe-2 icon-30"></i>{{$tix->jumlah}} Tiket</p>
                    <p class="color-white mb-0"><i class="fa fa-map-marker color-white pe-2 icon-30"></i>{{$tix->ticket->event->mulai_event}}</p>
                </div>
            </div>
            <div class="card-overlay bg-black opacity-70"></div>
        </a>
    @endforeach

    @include('pwa.layouts.toaster')
</div>
@include('pwa.layouts.footer')
