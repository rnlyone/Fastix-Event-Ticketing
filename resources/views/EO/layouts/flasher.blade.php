@if (session()->get('gagal'))
<div class="alert alert-danger dark" role="alert">
    <p>{{session('gagal')}}</p>
  </div>
@endif



@if (session()->get('sukses'))
    <div class="alert alert-primary dark" role="alert">
        <p>{{session('sukses')}}</p>
      </div>
@endif


@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger dark" role="alert">
        <p>{{$error}}</p>
    </div>
@endforeach
@endif
