@include('pwa.layouts.header', ['title' => ': Profil Saya', 'pagetitle' => 'Profil Saya', 'customcss' => ''])
<div class="page-content">
    <div class="card card-style" style="background-image: url('/storage/profile_pict/{{$userdata->profile_pict}}')" data-card-height="450">
        <div class="card-top">
            <form action="{{ route('cust.updatepp') }}" method="post" enctype="multipart/form-data">
                @csrf
                <a href="#" id="upload-link" class="btn btn-s border-white color-white float-end mt-2 me-2 rounded-sm"><i
                        class="fa fa-camera pe-2"></i>Upload </a>
                <input name="profile_pict" onchange="this.form.submit()" type="file" style="display: none;" id="upload-input" accept="image/*">
            </form>
            <script>
                document.getElementById("upload-link").addEventListener("click", function(e) {
                  e.preventDefault();
                  document.getElementById("upload-input").click();
                });
              </script>
        </div>
        <div class="card-bottom ms-3 me-3">
            <h1 class="font-40 line-height-xl color-white">{{$custdata->nama_lengkap ?? "User"}}</h1>
            <p class="color-white opacity-60"><i class="fa fa-map-marker me-2"></i>Fastix User</p>
            <p class="color-white opacity-80 font-15">
                {{$custdata->nama_lengkap ?? "User"}} sedang menggunakan aplikasi Fastix untuk membeli tiket event. Aplikasi ini memudahkan user untuk membeli tiket dengan cepat dan mudah.
            </p>
        </div>
        <div class="card-overlay bg-gradient"></div>
    </div>
    <div class="card card-style">
        <div class="content">
            <p class="mb-n1 color-highlight font-600 font-12">Edit Akun Kamu</p>
            <h4>Informasi User</h4>
            <p>
                Ubah informasi akun Anda untuk memastikan data yang terbaru dan akurat.
            </p>
            <form id="formId" action="{{route('cust.updateprofile')}}" method="post">
                @csrf
            <div class="mt-5 mb-3">
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="text" name="nama_lengkap" class="form-control validate-name" id="form1" placeholder="{{$custdata->nama_lengkap ?? ""}}" value="{{$custdata->nama_lengkap ?? ""}}" required>
                    <label for="form1" class="color-highlight">Nama Lengkap</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <select id="form5" name="jk" required>
                        <option value="default" disabled="" @if (!$custdata || $custdata->jk == NULL) selected="" @endif>Select a Value</option>
                        <option value="l" @if (!$custdata || $custdata->jk == NULL)  @elseif ($custdata->jk == 'l') selected="" @endif >Laki-laki</option>
                        <option value="p" @if (!$custdata || $custdata->jk == NULL)  @elseif ($custdata->jk == 'p') selected="" @endif>Perempuan</option>
                        </select>
                    <label for="form1" class="color-highlight">Jenis Kelamin</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="date" name="tgl_lahir" class="form-control validate-text" id="form6" value="{{$custdata->tgl_lahir ?? ""}}" required>
                    <label for="form1" class="color-highlight">Tanggal Lahir</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
            </div>
            <a href="#" onclick="document.getElementById('formId').submit();" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4">Simpan</a>
            </form>
        </div>
    </div>
    <div class="card card-style">
        <div class="content mb-0 mt-0">
            <div class="list-group list-custom-large list-icon-0 check-visited">
                <a href="#" class=" visited-link"><i
                        class="fa fa-cog rounded-sm gradient-dark color-white"></i>
                    <span class="font-14">Settings</span>
                    <strong class="font-10">More</strong>
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a href="{{route('logout')}}" class=" visited-link"><i
                        class="fa fa-sign-out rounded-sm gradient-red color-white"></i>
                    <span class="font-14">Logout</span>
                    <strong class="font-10">Keluar dari Akun Fastix Kamu</strong>
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
            <p class="font-11 opacity-70 font-italic line-height-s pt-4 pb-4"><strong
                    class="color-highlight">Note</strong>. When selecting a page, and coming back, it will be marked
                with a <i class="fa fa-check-circle color-green-dark ps-1 pe-1"></i> icon to make it easier for you to
                keep track of pages you've visited.</p>
        </div>
    </div>

    @include('pwa.layouts.toaster')
</div>
@include('pwa.layouts.footer')
