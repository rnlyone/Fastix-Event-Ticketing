@include('pwa.layouts.header', ['title' => ': Scan Event', 'pagetitle' => 'Scan Event', 'customcss' => ''])
<style>
    .scanner {
        width: 100%; /* Set width to 100% of parent element */
        height: 100%; /* Set height to 100% of parent element */
        display: flex;
        margin: auto;
    }
</style>
<div class="page-content">
    <div class="card card-style">
        <div class="content mb-0">
            <h3>Scan QR dari Event anda</h3>
            <p>
                Jika QR dari Event anda memiliki logo fastix, maka event tersebut telah menggunakan FASTIX
            </p>
            <div class="divider"></div>
            <p id="scanned-result"></p>
            <div id="selector" class="mx-auto"></div>
            <video id="scanner" allow="camera" style="width: 100%; height:100%; margin:auto"></video>
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
                        formData.append("id_event", content);
                        formData.append("_token", token);

                        var form = document.createElement("form");
                        form.setAttribute("method", "post");
                        form.setAttribute("action", "{{route('scan')}}");

                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", "id_event");
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
                                if (i === 0) {
                                    radio.setAttribute("checked", "checked");
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

        </script>


    </div>

    @include('pwa.layouts.toaster')
</div>




@include('pwa.layouts.footer')
