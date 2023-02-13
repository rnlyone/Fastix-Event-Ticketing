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
            </div>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Scan QR</h5><span>Berikut Tamu yang membeli tiket.</span>
                </div>
                <div class="content">
                    <div class="divider"></div>
                    <p id="scanned-result"></p>
                    <div id="selector">
                    </div>
                    <video id="scanner" allow="camera" style="width: 100%; height:100%; margin:auto"></video>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Profil User</h5><span>Berikut Profil User yang di Scan</span>
                    @include('EO.layouts.flasher')
                </div>
                @if ($tix == "")
                <div class="card custom-card">
                    <div class="card-header pb-0"><img class="img-fluid" src={{asset("assets/images/user-card/3.jpg")}} alt=""></div>
                        <div class="card-profile"><img class="rounded-circle" src="{{Storage::url('/profile_pict/' . ($user->profile_pict ?? 'default.png'))}}" alt=""></div>
                        <div class="text-center profile-details">
                            <h4><a href="social-app.html" alt="" data-bs-original-title="" title="">{{$user->customer->nama_lengkap ?? $user->username ?? 'User'}}</a></h4>
                            <h6>Event</h6>
                        </div>
                        <div class="row">
                            <thead>
                                <th>Jenis Tiket</th>
                                <th>Status Tiket</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$tix->orderdetail->ticket->nama_tiket ?? "user"}}</td>
                                    <td>@if (!empty($tix->status_tiket))
                                        @if ($tix->status_tiket == 0)
                                            <span class="badge rounded-pill badge-primary">Belum</span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Sudah Digunakan</span>
                                        @endif
                                    @else
                                        NULL
                                    @endif</td>
                                </tr>
                            </tbody>
                        </div>
                  </div>
                @else
                <div class="card custom-card">
                    <div class="card-header pb-0"><img class="img-fluid" src={{asset("assets/images/user-card/3.jpg")}} alt=""></div>
                        <div class="card-profile"><img class="rounded-circle" src="{{Storage::url('/profile_pict/' . ($tix->orderdetail->cust->profile_pict ?? 'default.png'))}}" alt=""></div>
                        <div class="text-center profile-details">
                            <h4><a href="social-app.html" alt="" data-bs-original-title="" title="">{{$tix->orderdetail->cust->customer->nama_lengkap ?? $tix->orderdetail->cust->username}}</a></h4>
                            <h6>{{$tix->orderdetail->ticket->event->nama_event}}</h6>
                        </div>
                        <div class="row">
                            <table>
                                <thead>
                                    <th>Jenis Tiket</th>
                                    <th>Status Tiket</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$tix->orderdetail->ticket->nama_tiket}}</td>
                                        <td>@if ($tix->status_tiket == 0)
                                            <span class="badge rounded-pill badge-primary">Belum</span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Sudah Digunakan</span>
                                        @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                  </div>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Tamu</h5><span>Berikut Tamu yang membeli tiket.</span>
                </div>
                <div class="table-responsive m-3">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Jenis Tiket</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paidtixes as $i => $paidtix)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$paidtix->orderdetail->cust->username ?? 'user'}}</td>
                                <td>{{$paidtix->orderdetail->ticket->nama_tiket}}</td>
                                <td>@if ($paidtix->status_tiket == 0)
                                    <span class="badge rounded-pill badge-primary">Belum</span>
                                @else
                                    <span class="badge rounded-pill badge-danger">Sudah</span>
                                @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>

    let scanner;

    // Meminta izin pengguna untuk menggunakan kamera
    if (navigator.mediaDevices === undefined) {
        navigator.mediaDevices = {};
    }

    if (navigator.mediaDevices.getUserMedia === undefined) {
        navigator.mediaDevices.getUserMedia = function (constraints) {
            var getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

            if (!getUserMedia) {
                return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
            }

            return new Promise(function (resolve, reject) {
                getUserMedia.call(navigator, constraints, resolve, reject);
            });
        }
    }



    function changeCamera(index) {
                document.cookie = "selectedCamera=" + index;
                Instascan.Camera.getCameras().then(function (cameras) {
                    scanner.start(cameras[index]);
                });
            }

    navigator.mediaDevices.getUserMedia({
            video: { facingMode: { exact: "environment" } },
            mirror:false
        })
        .then(function (stream) {
            scanner = new Instascan.Scanner({
                video: document.getElementById('scanner')
            });


            scanner.addListener('scan', function (content) {
                document.getElementById('scanned-result').innerHTML = content;

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                var formData = new FormData();
                formData.append("id_token", content);
                formData.append("_token", token);

                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{route('event.scan')}}");

                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", "id_token");
                hiddenField.setAttribute("value", content);

                var tokenField = document.createElement("input");
                tokenField.setAttribute("type", "hidden");
                tokenField.setAttribute("name", "_token");
                tokenField.setAttribute("value", token);

                form.appendChild(hiddenField);
                form.appendChild(tokenField);

                document.body.appendChild(form);
                form.submit();
            });






            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    for (var i = 0; i < cameras.length; i++) {
                        var camera = cameras[i];
                        var radio = document.createElement("input");
                        radio.setAttribute("type", "radio");
                        radio.setAttribute("name", "camera");
                        radio.setAttribute("value", i);
                        radio.setAttribute("onclick", "changeCamera(this.value)");

                        var selectedCamera = getSelectedCamera();
                        if (i === selectedCamera) {
                            radio.setAttribute("checked", "checked");
                            scanner.start(cameras[i]);
                        }

                        var label = document.createElement("label");
                        label.appendChild(radio);
                        label.innerHTML += "Kamera " + (i + 1);
                        document.getElementById("selector").appendChild(label);
                    }
                } else {
                    console.error("No cameras found.");
                }
            });
        })
        .catch(function (err) {
            console.log(err);
        });

        function getSelectedCamera() {
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.startsWith("selectedCamera=")) {
                    return parseInt(cookie.split("=")[1]);
                }
            }
            return 0;
        }

</script>


@include('EO.layouts.footer')




<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
