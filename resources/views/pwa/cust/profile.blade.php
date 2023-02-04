@include('pwa.layouts.header', ['title' => ': Profil Saya', 'pagetitle' => 'Profil Saya', 'customcss' => ''])
<div class="page-content">
    <div class="card card-style bg-28" data-card-height="450">
        <div class="card-top">
            <a href="#" class="btn btn-s border-white color-white float-end mt-2 me-2 rounded-sm"><i
                    class="fa fa-camera pe-2"></i>Upload </a>
        </div>
        <div class="card-bottom ms-3 me-3">
            <h1 class="font-40 line-height-xl color-white">Jane<br>Louder</h1>
            <p class="color-white opacity-60"><i class="fa fa-map-marker me-2"></i>San Francisco, California</p>
            <p class="color-white opacity-80 font-15">
                Jane loves listening to really loud music, hanging out with friends and partying on the weeends!
            </p>
        </div>
        <div class="card-overlay bg-gradient"></div>
    </div>
    <div class="card card-style">
        <div class="content">
            <p class="mb-n1 color-highlight font-600 font-12">Edit your Account</p>
            <h4>Basic Information</h4>
            <p>
                Public information that shows on top of your card in your profile page. This is just a dummy page.
            </p>
            <div class="mt-5 mb-3">
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1" placeholder="Jane">
                    <label for="form1" class="color-highlight">First Name</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1" placeholder="Louder">
                    <label for="form1" class="color-highlight">Last Name</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1" placeholder="name@domain.com">
                    <label for="form1" class="color-highlight">Email Address</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1"
                        placeholder="San Francisco, California">
                    <label for="form1" class="color-highlight">Location</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon input-style-always-active mb-4">
                    <textarea id="form7"
                        placeholder="Enter your message">Jane loves listening to really loud music, hanging out with friends and partying on the weekends!</textarea>
                    <label for="form7" class="color-highlight">Enter your Message</label>
                </div>
            </div>
            <a href="#" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4">Save Basic
                Information</a>
        </div>
    </div>
    <div class="card card-style">
        <div class="content">
            <p class="mb-n1 color-highlight font-600 font-12">Edit your General</p>
            <h4>Privacy Settings</h4>
            <p>
                Private information that doesn't show on top of your card in your profile page. This is just a dummy
                page.
            </p>
            <div class="d-flex mb-3">
                <div class="pt-1">
                    <h5 data-data-trigger-switch="toggle-id-1" class="font-600 font-14">Private Profile</h5>
                </div>
                <div class="ms-auto me-3 pe-2">
                    <div class="custom-control ios-switch small-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-1">
                        <label class="custom-control-label" for="toggle-id-1"></label>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="pt-1">
                    <h5 data-data-trigger-switch="toggle-id-2" class="font-600 font-14">Share Location</h5>
                </div>
                <div class="ms-auto me-3 pe-2">
                    <div class="custom-control ios-switch small-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-2">
                        <label class="custom-control-label" for="toggle-id-2"></label>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="pt-1">
                    <h5 data-data-trigger-switch="toggle-id-3" class="font-600 font-14">Subscribe to Mails</h5>
                </div>
                <div class="ms-auto me-3 pe-2">
                    <div class="custom-control ios-switch small-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-3" checked>
                        <label class="custom-control-label" for="toggle-id-3"></label>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="pt-1">
                    <h5 data-data-trigger-switch="toggle-id-4" class="font-600 font-14">Hide Email Address</h5>
                </div>
                <div class="ms-auto me-3 pe-2">
                    <div class="custom-control ios-switch small-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-4" checked>
                        <label class="custom-control-label" for="toggle-id-4"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-menu-load="{{route('menufooter')}}"></div>

    @include('pwa.layouts.toaster')
</div>
@include('pwa.layouts.footer')
