@include('pwa.layouts.header', ['title' =>': Login', 'pagetitle' => 'Login', 'customcss' => ''])
<div class="page-content">
    @if ($errors->any())
            <div class="alert me-3 ms-3 rounded-s bg-red-dark " role="alert">
                <span class="alert-icon color-white"><i class="fa fa-times-circle font-18"></i></span>
                <h4 class="color-white">Error</h4>
                <strong class="alert-icon-text color-white">{{$errors->first()}}</strong>
                <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        @endif
    <div class="card card-style">
        <div class="content">
            <p class="font-600 color-highlight mb-n1">Let's start</p>
            <h1 class="font-30">Sign In</h1>
            <p>
                Masukkan Akun Anda di bawah ini untuk masuk ke akun Anda.
            </p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" class="form-control validate-username" id="form1" placeholder="username">
                    <label for="form1a" class="color-highlight">Username</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="email" name="email" class="form-control validate-email" id="form1a" placeholder="Email">
                    <label for="form1a" class="color-highlight">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="number" name="no_hp" class="form-control validate-nomor_telepon" id="form1" placeholder="Nomor Telepon">
                    <label for="form1a" class="color-highlight">Nomor Telepon</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" class="form-control validate-password" id="form1ab" placeholder="Password">
                    <label for="form1ab" class="color-highlight">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="confirm_password" name="confirm_password" class="form-control validate-confirm_password" id="form1ab" placeholder="Confirm Password">
                    <label for="form1ab" class="color-highlight">Confirm Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <button type="submit"
                    class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Sign In</button>
            </form>
            <div class="row pt-3 mb-3">
                <div class="col-6 text-start">
                    {{-- <a href="page-system-forgot-1.html" class="color-highlight">Forgot Password?</a> --}}
                </div>
                <div class="col-6 text-end">
                    <a href="page-system-signup-1.html" class="color-highlight">Create Account</a>
                </div>
            </div>
        </div>
    </div>
    <div data-menu-load="/menufooter"></div>

    <script>
        let password = document.querySelector('input[name="password"]');
        let confirmPassword = document.querySelector('input[name="confirm_password"]');

        password.addEventListener("input", function() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Password tidak sama");
            } else {
                confirmPassword.setCustomValidity("");
            }
        });

        confirmPassword.addEventListener("input", function() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Password tidak sama");
            } else {
                confirmPassword.setCustomValidity("");
            }
        });

    </script>

    @include('pwa.layouts.toaster')
</div>

@include('pwa.layouts.footer')
