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
    <title>THE RICE - Nạp tiền</title>
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ date('YmdHis')}}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
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
                <div class="container-fluid">
                    <div class="row">
                        <button class="navbar-toggler btn-sidebar mt-1" type="button">
                            <span class="navbar-toggler-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false" style="color: #000;">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </span>
                        </button>
                        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                            <div class="sidebar-sticky pt-3">
                                @include(
                                'pages.subpages.side_bar',
                                [
                                'index' => 1
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1><img class="fluid-img bank-img" src="{{ asset('images/bank.png') }}" alt=""> Hình thức nạp tiền</h1>
                                            <form action="{{ route('post_deposit') }}" id="form-profile" method="POST" novalidate>
                                                @csrf
                                                <div class="form-group row mb-1 mt-2">
                                                    <div class="col-12 col-sm-12">
                                                        <button type="submit" class="btn btn-danger">NẠP TIỀN ONLINE</button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-1 mt-1">
                                                    <div class="col-12 col-sm-12">
                                                        Lưu ý: Để quá trình chuyển khoản nhanh chóng, vui lòng điền đúng họ tên thật người nạp để tránh quá trình bị gián đoạn hoặc thất bại.
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Số tiền</label>
                                                    <div class="col-8 col-sm-9">
                                                        <input required
                                                            data-validation-required-message="Vui lòng nhập số tiền: 100.000 ~ 100.000.000.000.000" min="100000" max="100000000000" type="number" name="amount" class="form-control" value="">
                                                        <small id="emailHelp" class="form-text text-muted">Khoảng giới hạn: 100.000 ~ 100.000.000.000</small>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Tên người nạp</label>
                                                    <div class="col-8 col-sm-9">
                                                        <input required
                                                            data-validation-required-message="Vui lòng nhập tên người nạp" type="text" name="name" maxlength="255" class="form-control" value="">
                                                        <small id="emailHelp" class="form-text text-muted">Điền họ tên người nạp</small>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Ghi chú</label>
                                                    <div class="col-8 col-sm-9">
                                                        <input required
                                                            data-validation-required-message="Vui lòng nhập thông tin chuyển khoản" type="text" name="note" maxlength="255" class="form-control" value="">
                                                        <small id="emailHelp" class="form-text text-muted">Thông tin chuyển khoản</small>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="text-center"><button type="submit" class="btn btn-primary">NẠP TIỀN</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="danger"><i class="fa fa-warning danger"></i> LỜI NHẮC NẠP TIỀN</h2>
                                            <ol class="list-note">
                                                <li>Vui lòng điền số tiền theo tỉ lệ 1:1. Ví dụ bạn muốn nạp 1,000,000đ vui lòng nhập 1000000 vào số tiền cần nạp.</li>
                                                <li>Thời gian CSKH phục vụ nạp tiền là 24/24.</li>
                                                <li>Sau khi nạp tiền thành công vui lòng kiểm tra ví tiền của bạn.</li>
                                                <li>Nếu có vấn đề vui lòng liên hệ CSKH.</li>
                                                <li>Nếu trong quá trình nạp gặp vấn đề hoặc không hiển thị vui lòng tải lại hoặc thay đổi trình duyệt rồi thử lại.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include(
        'pages.subpages.footer'
    )

    <form id="form_back" action="{{ route('deposit') }}" method="GET" style="display: none;"></form>

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

    <!-- END: Page JS-->
    <script>
        function initValidation() {
            if ($("#form-profile").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-profile").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateData($form, true);
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        }

        $(document).ready(function() {
            initValidation();
            $(".btn-sidebar").on('click', function(event) {
                $('#sidebarMenu').toggle({
                    direction: "left"
                }, 100);
            });
        });
    </script>
</body>
<!-- END: Body-->

</html>