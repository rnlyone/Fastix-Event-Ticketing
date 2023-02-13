
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

                    var radioContainer = document.createElement("div");
                    radioContainer.setAttribute("style", "display: flex; flex-direction: row; margin: 10px 0;");

                    cameras.forEach(function (camera, index) {
                        var radio = document.createElement("input");
                        radio.setAttribute("type", "radio");
                        radio.setAttribute("name", "camera");
                        radio.setAttribute("value", camera.id);
                        radio.setAttribute("id", "camera-" + index);

                        if (index === 1) {
                            radio.setAttribute("checked", "checked");
                        }

                        var label = document.createElement("label");
                        label.setAttribute("for", "camera-" + index);
                        label.innerHTML = camera.name;

                        radioContainer.appendChild(radio);
                        radioContainer.appendChild(label);
                    });

                    document.body.appendChild(radioContainer);

                    var radios = document.querySelectorAll('input[type="radio"][name="camera"]');
                    radios.forEach(function (radio) {
                        radio.addEventListener("change", function () {
                            scanner.stop();
                            Instascan.Camera.getById(this.value).then(function (selectedCamera) {
                                scanner.start(selectedCamera);
                            });
                        });
                    });
                });
            });
