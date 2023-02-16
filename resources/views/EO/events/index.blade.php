@include('EO.layouts.app')

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
                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="modal" data-original-title="test" data-bs-target="#newevent"
                                data-placement="top" title="" data-original-title="Learning"><i data-feather="plus"></i></a></li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card">
        @include('EO.layouts.flasher')
        <div class="card-header">
            <h5>Tabel Event</h5><span>Berikut Event yang kamu Selenggarakan.</span>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Tutup Regis</th>
                        <th scope="col">Mulai Event</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $i => $event)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$event->nama_event}}</td>
                        <td>{{date("d-m-Y", strtotime($event->tutup_regis))}}</td>
                        <td>{{date("d-m-Y", strtotime($event->mulai_event))}}</td>
                        <td>@if ($event->visibility == 0)
                            <span class="badge badge-danger">Tidak Terlihat</span>
                            @else
                            <span class="badge badge-success">Terlihat</span>
                            @endif</td>
                        <td>
                            <div style="display: flex; justify-content: center;">
                                <button class="btn btn-primary px-3" style="width: 50px; height: 50px;" onclick="location.href='{{route('event.detail', [$event->uuid])}}'">
                                    <i data-feather="edit" style="margin: 0; display: flex; align-items: center;"></i>
                                </button>
                                <form action="{{ route('event.destroy', $event->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger px-3" type="submit" style="width: 50px; height: 50px;" onclick="return confirm('Are you sure you want to delete this event?');">
                                        <i style="margin: 0; display: flex; align-items: center;" data-feather="trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



{{-- modal new event --}}

<div class="modal fade" id="newevent" tabindex="-1" aria-labelledby="newevent" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New message</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" method="POST" enctype="multipart/form-data"
        action="{{route('event.store')}}">
        <div class="modal-body">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama event</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="nama_event"
                                     type="text" value="{{old('nama_event')}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="lokasi"
                                    type="text">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Max. Pembelian</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input value="{{$eventdetail->max_buy ?? "0"}}" name="max_buy" class="touchspin" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Buka Registrasi</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" name="buka_regis" type="datetime-local"
                                value="{{old('buka_regis')}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tutup Registrasi</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" name="tutup_regis" type="datetime-local"
                                value="{{old('tutup_regis')}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Mulai Event</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" name="mulai_event" type="datetime-local"
                                value="{{old('mulai_event')}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Selesai Event</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" name="selesai_event" type="datetime-local"
                                value="{{old('selesai_event')}}">
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
                                                    @if (old('visibility') == 1) checked @endif>
                                                <label for="visibility1">Terlihat</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="radio radio-primary">
                                                <input id="visibility0" type="radio" name="visibility" value="0"
                                                    @if (old('visibility') == 0) checked @endif>
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
                                    rows="3">{{old('sinopsis')}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi"
                                    rows="3">{{old('deskripsi')}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-9">
                                <input name="img_url" class="form-control" type="file">
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

@include('EO.layouts.footer')

<script src="{{asset("assets/js/touchspin/touchspin.js")}}"></script>
<script src="{{asset("assets/js/touchspin/input-groups.min.js")}}"></script>
