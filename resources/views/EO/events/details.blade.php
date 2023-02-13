@include('EO.layouts.app')


@php
use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>{{$pagetitle}}</h3>
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $bc)
                    <li class="breadcrumb-item"><a href="{{$bc[1]}}">{{$bc[0]}}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Informasi dasar Event</h5>
                </div>
                <form class="form theme-form" method="POST" enctype="multipart/form-data"
                    action="{{route('event.update', ['uuid' => $eventdetail->uuid])}}">
                    @csrf
                    <div class="card-body">
                        @include('EO.layouts.flasher')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama event</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="nama_event"
                                            value="{{$eventdetail->nama_event ?? ""}}" type="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="lokasi" value="{{$eventdetail->lokasi ?? ""}}"
                                            type="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Max. Pembelian</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="max_buy"
                                            value="{{$eventdetail->max_buy ?? ""}}" type="number">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Buka Registrasi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" name="buka_regis" type="datetime-local"
                                            value="{{$eventdetail->buka_regis ?? ""}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tutup Registrasi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" name="tutup_regis" type="datetime-local"
                                            value="{{$eventdetail->tutup_regis ?? ""}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mulai Event</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" name="mulai_event" type="datetime-local"
                                            value="{{$eventdetail->mulai_event ?? ""}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Selesai Event</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" name="selesai_event" type="datetime-local"
                                            value="{{$eventdetail->selesai_event ?? ""}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Visibilitas</label>
                                    <div class="col-sm-9">
                                        <div class="form-group m-t-15 custom-radio-ml">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <input id="visibility1" type="radio" name="visibility" value="1"
                                                            @if ($eventdetail->visibility == 1) checked @endif>
                                                        <label for="visibility1">Terlihat</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <input id="visibility0" type="radio" name="visibility" value="0"
                                                            @if ($eventdetail->visibility == 0) checked @endif>
                                                        <label for="visibility0">Tidak Terlihat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Sinopsis</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="sinopsis"
                                            rows="3">{{$eventdetail->sinopsis ?? ""}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="deskripsi"
                                            rows="3">{{$eventdetail->deskripsi ?? ""}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Upload File</label>
                                    <div class="col-sm-9">
                                        <input name="img_url" class="form-control" type="file">
                                        <img class="mt-3" style="width: inherit; height auto;" src="{{Storage::url('/img_url_event/' . $eventdetail->img_url)}}" alt="{{$eventdetail->img_url}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-9">
                        <h5>Attendance</h5><span>Lihat Semua Orang Yang Membeli Tiket</span>
                    </div>
                    <div class="col-sm-3 align-items-end">
                        <button class="btn btn-outline-primary" type="button" onclick="location.href='{{route('event.attend', [$eventdetail->uuid])}}'"><i data-feather='paperclip'></i></button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-9">
                        <h5>Tickets</h5><span>Tiket-tiket yang kamu akan jual</span>
                    </div>
                    <div class="col-sm-3 align-items-end">
                        <button data-bs-toggle="modal" data-original-title="test" data-bs-target="#newticket" class="btn btn-outline-primary" type="button"><i data-feather='plus'></i></button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Tiket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuota</th>
                        <th scope="col">Tersisa</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($eventdetail->tickets as $i => $ticket)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$ticket->nama_tiket}}</td>
                            <td>Rp. {{number_format($ticket->harga)}}</td>
                            <td>{{$ticket->kuota}}</td>
                            @php
                                $summ = 0;
                                foreach ($ticket->orderdetails as $j => $orderdetail) {
                                    $stat = $orderdetail->order->status_bayar;
                                    if($stat == 'sukses'){
                                        $summ = $summ + $orderdetail->jumlah;
                                    }

                            }
                            @endphp
                            <td>{{$ticket->kuota - $summ}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-original-title="test" data-bs-target="#editticket{{$ticket->id}}"><i data-feather="edit"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                  <h5>QR Code Event</h5><span>Gunakan QR ini di semua media event kamu</span>
                </div>
                <div class="card-body mx-auto">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{$eventdetail->uuid}}" >
                </div>
              </div>
        </div>
    </div>
</div>


<div class="modal fade" id="newticket" tabindex="-1" aria-labelledby="newticket" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buat Tiket Baru</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" method="POST" enctype="multipart/form-data"
        action="{{route('ticket.store', ['uuid' => $eventdetail->uuid])}}">
        <div class="modal-body">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Tiket</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="nama_tiket"
                                     type="text" value="{{old('nama_tiket')}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="harga"
                                    type="text">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kuota</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kuota" value="{{old('kuota')}}"
                                     type="number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
      </div>
    </div>
</div>

@foreach ($eventdetail->tickets as $ticket)
<div class="modal fade" id="editticket{{$ticket->id}}" tabindex="-1" aria-labelledby="newticket" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" method="POST" enctype="multipart/form-data"
        action="{{route('ticket.update', ['uuidtix' => Crypt::encryptString($ticket->id)])}}">
        <div class="modal-body">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Tiket</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="nama_tiket"
                                     type="text" value="{{$ticket->nama_tiket}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="harga"
                                    type="text" value="{{$ticket->harga}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kuota</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kuota" value="{{$ticket->kuota}}"
                                     type="number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
      </div>
    </div>
</div>
@endforeach

@include('EO.layouts.footer')
