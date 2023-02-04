@include('pwa.layouts.header', ['title' => ': Checkout', 'pagetitle' => 'Checkout', 'customcss' => ''])

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
            <a href="#" id="pay-button" class="btn btn-full btn-l rounded-s font-600 gradient-highlight">Bayar
                Sekarang</a>
        </div>
    </div>
</div>

<div id="menu-warning-2" class="menu menu-box-modal bg-red-dark rounded-m" data-menu-height="310" data-menu-width="350">
    <h1 class="text-center mt-4"><i class="fa fa-3x fa-times-circle scale-box color-white shadow-xl rounded-circle"></i></h1>
    <h1 class="text-center mt-3 text-uppercase color-white font-700">Pembayaran Gagal :(</h1>
    <p class="boxed-text-l color-white opacity-70">
        Harap untuk menyelesaikan Pembayaran anda.<br>
    </p>
    <a href="#" class="close-menu btn btn-m btn-center-l button-s shadow-l rounded-s text-uppercase font-600 bg-white color-black">Kembali</a>
</div>

<div id="menu-warning-3" class="menu menu-box-modal bg-red-dark rounded-m" data-menu-height="310" data-menu-width="350">
    <h1 class="text-center mt-4"><i class="fa fa-3x fa-times-circle scale-box gradient-yellow shadow-xl rounded-circle"></i></h1>
    <h1 class="text-center mt-3 text-uppercase color-warning font-700">Pembayaran Tertunda</h1>
    <p class="boxed-text-l color-warning opacity-70">
        Harap untuk menyelesaikan Pembayaran anda.<br>
    </p>
    <a href="#" class="close-menu btn btn-m btn-center-l button-s shadow-l rounded-s text-uppercase font-600 bg-white color-black">Kembali</a>
</div>

<div id="menu-warning-406" class="menu menu-box-modal bg-red-dark rounded-m" data-menu-height="310" data-menu-width="350">
    <h1 class="text-center mt-4"><i class="fa fa-3x fa-times-circle scale-box gradient-yellow shadow-xl rounded-circle"></i></h1>
    <h1 class="text-center mt-3 text-uppercase color-warning font-700">Pembayaran Tertunda</h1>
    <p class="boxed-text-l color-warning opacity-70">
        Harap untuk menyelesaikan Pembayaran anda.<br>
    </p>
    <a href="#" class="close-menu btn btn-m btn-center-l button-s shadow-l rounded-s text-uppercase font-600 bg-white color-black">Kembali</a>
</div>

<div id="menu-success-2" class="menu menu-box-modal bg-green-dark rounded-m" data-menu-height="310" data-menu-width="350">
    <h1 class="text-center mt-4"><i class="fa fa-3x fa-check-circle scale-box color-white shadow-xl rounded-circle"></i></h1>
    <h1 class="text-center mt-3 font-700 color-white">Pembayaran Sukses</h1>
    <p class="boxed-text-l color-white opacity-70">
        diharap jangan merefresh halaman ini,<br> kamu akan diarahkan ke halaman invoice.
    </p>
    <a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-600 bg-white color-black">Great, Thanks!</a>
</div>


<form action="{{route('order.response')}}" id="submit_form" method="post">
    @csrf
    <input type="hidden" name="order_id" value="{{$order->id}}">
    <input type="hidden" name="json" id="json_callback">
</form>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          console.log(result);
          var successmodal1 = document.getElementById("menu-success-2");
            successmodal1.classList.add("menu-active");
            sendtocontroller(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
            console.log(result);
            var warningmodal1 = document.getElementById("menu-warning-3");
            warningmodal1.classList.add("menu-active");
            sendtocontroller(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
          var warningmodal1 = document.getElementById("menu-warning-2");
            warningmodal1.classList.add("menu-active");
            sendtocontroller(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          var warningmodal1 = document.getElementById("menu-warning-3");
            warningmodal1.classList.add("menu-active");
            sendtocontroller(result);
        }
      });
      // customer will be redirected after completing payment pop-up
    });

    function sendtocontroller(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }
  </script>

  @include('pwa.layouts.toaster')

@include('pwa.layouts.footer')
