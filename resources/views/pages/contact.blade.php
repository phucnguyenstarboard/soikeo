<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="iFor">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>THE RICE - CSKH</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" href="{{ asset('vuexy5.4/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu" data-open="click" data-menu="horizontal-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    @include('pages.subpages.menu')
    <!-- END: Header-->
    <!-- BEGIN: Content-->
    <div class="app-content content mt-5">
        <div class="header-navbar-shadow"></div>
        <div class="load_spinner">
            <div class="content-header row">
                <div class="content-header-left col-10">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0"></h2>
                            <div class="breadcrumb-wrapper col-12">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-2">
                </div>
            </div>
            <div class="content-body">

                <section class="s-contact">
                    <!-- list -->
                    <div class="row mt-5 text-center">
                        <div class="col-12 col-md-4 text-center mx-auto mb-2">
                           <div class="card" style="width: 30rem;margin: auto;">
                              <img class="card-img-top" src="{{ asset('images/cskh.jpg') }}" alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title">Hỗ trợ  viên 1</h5>
                                <p class="card-text">CSKH 24/7</p>
                                <a href="{{ route('chat') }}" class="btn btn-primary mb-2 zoom">LIÊN HỆ NGAY</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mx-auto mb-2">
                           <div class="card" style="width: 30rem;margin: auto;">
                              <img class="card-img-top" src="{{ asset('images/cskh.jpg') }}" alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title">Hỗ trợ  viên 2</h5>
                                <p class="card-text">CSKH 24/7</p>
                                <a href="{{ route('chat') }}" class="btn btn-primary mb-2 zoom">LIÊN HỆ NGAY</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mx-auto mb-5">
                           <div class="card" style="width: 30rem;margin: auto;">
                              <img class="card-img-top" src="{{ asset('images/cskh.jpg') }}" alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title">Hỗ trợ  viên 3</h5>
                                <p class="card-text">CSKH 24/7</p>
                                <a href="{{ route('chat') }}" class="btn btn-primary mb-2 zoom">LIÊN HỆ NGAY</a>
                              </div>
                            </div>
                        </div>
                    </div>

                

                </section>

            </div>

            @include(
                'pages.subpages.footer'
            )

        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src=" {{ asset('/vuexy5.4/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('vuexy5.4/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/ajax.js') }}"></script>
</body>
<!-- END: Body-->

</html>