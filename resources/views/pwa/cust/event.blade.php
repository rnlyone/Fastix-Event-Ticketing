@include('pwa.layouts.header', ['title' => ': Detail Event', 'pagetitle' => 'Event Detail', 'customcss' => ''])
<div class="page-content">
    <a href="{{Storage::url('/img_url_event/' . $eventdetail->img_url)}}"
        data-gallery="gallery-1" class="default-link card card-style"
        style="background-image : url({{Storage::url('/img_url_event/' . $eventdetail->img_url)}});"
        data-card-height="450" title="Screaming Music">
        <div class="card-top">
            <span class="btn btn-m bg-red-dark rounded-sm font-700 scale-box float-end mt-2 me-2">Klik Untuk Lihat Full</span>
        </div>
        </a>
    <div class="card card-style">
        <div class="content">
            @php
                setlocale(LC_TIME, 'id_ID.utf8');
                $formattedDate = strftime("%A, %d %B %Y", strtotime($eventdetail->mulai_event));

                $start_date = date('d F Y H:i', strtotime($eventdetail->mulai_event));
                $end_date = date('d F Y H:i', strtotime($eventdetail->selesai_event));
                $range = $start_date . ' s/d ' . $end_date;
            @endphp
            <p class="font-600 color-highlight mb-n1">{{$formattedDate}}</p>
            <h1 class="font-30 font-800">{{$eventdetail->nama_event}}</h1>
            <p class="font-14 mb-3">
                {{$eventdetail->sinopsis}}
            </p>

            @php
                $tickets = $eventdetail->tickets;

                $sum = 0;
                foreach ($tickets as $i => $tic) {
                    $orderdetails = $tic->orderdetails;
                    foreach ($orderdetails as $j => $orderdetail) {
                        $stat = $orderdetail->order->status_bayar;
                            if($stat == 'sukses'){
                                $sum = $sum + $orderdetail->jumlah;
                            }
                    }
                }
            @endphp
            <p class="opacity-50">
                <i class="fa icon-30 text-center fa-star pe-2"></i>{{$sum}} Terjual <span
                    class="badge bg-transparent border border-red-dark color-red-dark ms-2">PREMIUM</span><br>
                <i class="fa icon-30 text-center fa-map-marker pe-2"></i> {{$eventdetail->lokasi}} <br>
                <i class="fa icon-30 text-center fa-calendar pe-2"></i>{{$range}}
            </p>
        </div>
    </div>
    <div class="card card-style shadow-0 mb-4">
        <button class="btn accordion-btn color-black no-effect collapsed" data-bs-toggle="collapse"
            data-bs-target="#collapse4" aria-expanded="false">
            <i class="fa fa-heart me-2"></i>
            Deskripsi Event
            <i class="fa fa-plus font-10 accordion-icon"></i>
        </button>
        <div id="collapse4" class="bg-theme collapse" data-bs-parent="#accordion-2" style="">
            <div class="mx-3 mb-3">
                <p class="mb-0">{{$eventdetail->deskripsi}}</p>
            </div>
        </div>
    </div>
    @if ($eventdetail->selesai_event > date('Y-m-d H:i:s'))
        <a href="#" data-menu="menu-cart-item"
        class="btn btn-full btn-margins rounded-sm gradient-highlight font-14 font-600 btn-xl">Reservasi Tiket</a>
    @else
        <a href="#"
        class="btn btn-border btn-full btn-margins rounded-sm border-blue-dark color-blue-dark font-14 font-600 btn-xl">Event Sudah Selesai</a>
    @endif
</div>


{{-- modal pesan tiket --}}
<div id="menu-cart-item" class="menu menu-box-modal rounded-m bg-theme" data-menu-width="350" data-menu-height="auto">
    <div class="menu-title">
        <p class="color-highlight">Pilih</p>
        <h1 class="font-800">Tiket</h1>
        <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
    </div>
    <div class="divider divider-margins mt-3 mb-3"></div>
    <div class="content mt-0">
        <form action="{{route('cust.ordernow')}}" method="post" id="ticketform">
            @csrf
            <input type="hidden" name="order" value="0">
            <input type="hidden" name="id_event" value="{{$eventdetail->id}}">
            <div style="max-height: 300px; overflow-y: auto;">
                @foreach ($tickets as $ticket)
                <div class="list-group list-custom-small">
                    <div class="d-flex mb-3">
                        <div class="align-self-center pt-1">
                            @php
                            $orderdetails = $ticket->orderdetails;

                            $summ = 0;
                            foreach ($orderdetails as $j => $orderdetail) {
                                $stat = $orderdetail->order->status_bayar;

                                if($stat == 'sukses'){
                                    $summ = $summ + $orderdetail->jumlah;
                                }

                            }
                            @endphp
                            <h6 class="font-500 font-14">{{$ticket->nama_tiket}} ({{$ticket->kuota - $summ}})</h6>
                            <h5 class="font-700 color-highlight">Rp.{{number_format($ticket->harga)}}.<sup>/pcs</sup></h5>
                        </div>
                        <div class="stepper rounded-s align-self-center me-n2 mx-auto float-end">
                            <a href="#" onclick="setTimeout(updateTotal, 50)" class="stepper-sub"><i
                                    class="fa fa-minus color-theme opacity-40 mx-auto"></i></a>
                            <input oninput="updateTotal()" name="{{$ticket->id}}" type="number" min="0"
                                max="{{$ticket->event->max_buy}}" value="0">
                            <a href="#" onclick="setTimeout(updateTotal, 50)" class="stepper-add"><i
                                    class="fa fa-plus color-theme opacity-40 mx-auto"></i></a>
                        </div>
                    </div>
                    <div class="divider divider-margins mb-3"></div>
                </div>
                @endforeach
            </div>
            <div class="divider divider-margins mt-3 mb-3"></div>
            <div class="d-flex">
                <div class="pe-4 w-100">
                    <p class="font-600 color-highlight mb-0 font-13">Your Total</p>
                    <h2 id="total">Rp.0</h2>
                </div>
                <div class="w-100 pt-1">
                    <h6 class="font-14 font-700">Admin<span class="float-end color-green-dark">+Rp.
                            {{number_format($adminfee)}}</span></h6>
                    <div class="divider mb-2 mt-1"></div>
                </div>
            </div>
            <div class="divider divider-margins mb-3"></div>
            <div class="row mb-3">
                <div class="col-4">
                    <a href="#"
                        onclick="document.getElementsByName('order')[0].value='0'; document.getElementById('ticketform').submit();"
                        class="close-menu btn btn-full gradient-green font-13 btn-m font-600rounded-s "><i
                            class="fa fa-plus"></i><i class="fa fa-right"></i><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div class="col-8">
                    <a href="#"
                        onclick="document.getElementsByName('order')[0].value='1'; document.getElementById('ticketform').submit();"
                        class="close-menu btn btn-full gradient-blue font-13 btn-m font-600 rounded-s ">Order
                        Now</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let ticketIdToPriceMap = {
        @foreach ($tickets as $ticket)
            {{$ticket->id}}: {{$ticket->harga}},
        @endforeach
    };

    function updateTotal() {
      let inputs = document.querySelectorAll('input[type="number"]');
      let total = 0;

      inputs.forEach(function(input) {
        let ticketId = input.getAttribute('name');
        let ticketPrice = parseInt(ticketIdToPriceMap[ticketId]);
        let ticketQuantity = parseInt(input.value);
        let max = parseInt(input.getAttribute('max'));
        let min = parseInt(input.getAttribute('min'));

        if (ticketQuantity > max) {
          input.value = max;
        } else if (ticketQuantity < min) {
          input.value = min;
        }
        ticketQuantity = Math.max(0, Math.min(max, ticketQuantity));
        total += ticketPrice * ticketQuantity;
      });

      document.querySelector('#total').innerHTML = 'Rp. ' + total.toLocaleString();
    }
  </script>



@include('pwa.layouts.footer')
