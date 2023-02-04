@if (session()->get('gagal'))
    <div id="toast-2" class="toast toast-tiny toast-top bg-red-dark" data-bs-delay="1000" data-bs-autohide="true"><i class="fa fa-info me-3"></i>{{session('gagal')}}</div>
    <script>
    window.onload = (event) => {
        var toastLiveExample = document.getElementById('toast-2')
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }
    </script>
@endif

@if (session()->get('sukses'))
    <div id="toast-2" class="toast toast-tiny toast-top bg-green-dark" data-bs-delay="1000" data-bs-autohide="true"><i class="fa fa-info me-3"></i>{{session('sukses')}}</div>
    <script>
    window.onload = (event) => {
        var toastLiveExample = document.getElementById('toast-2')
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }
    </script>
@endif
