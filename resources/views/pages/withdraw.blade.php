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
    <title>THE RICE - Rút tiền</title>
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
                                'index' => 2
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1><i class="feather icon-edit"></i> Vui lòng điền các mục sau</h1>
                                            <form action="{{ route('post_withdraw') }}" id="form-profile" method="POST" novalidate>
                                                @csrf
                                                <div class="form-group row mb-1 mt-2">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Số tiền rút</label>
                                                    <div class="col-8 col-sm-9">
                                                        <input required
                                                            data-validation-required-message="Vui lòng nhập số tiền: 50.000 ~ 999.999.999.999" min="50000" max="999999999999" type="number" name="amount" class="form-control" value="">
                                                        <small id="emailHelp" class="form-text text-muted">Khoảng giới hạn:: 50.000 ~ 999.999.999.999 (Tỉ lệ rút là 1:1)</small>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Mật khẩu quỹ</label>
                                                    <div class="col-8 col-sm-9">
                                                        <div class="input-group" id="show_hide_password">
                                                            <input required
                                                                data-validation-required-message="Vui lòng nhập mật khẩu quỹ" type="password" name="password_fund" maxlength="255" class="form-control" value="">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="button"><i class="fa fa-eye-slash dark"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Ngân hàng rút</label>
                                                    <div class="col-8 col-sm-9">
                                                        <select required
                                                            data-validation-required-message="Vui lòng chọn ngân hàng rút" class="form-control" id="cbxBank" name="bank">
                                                            <option value="">Chọn ngân hàng</option>
                                                            @if(!empty($user->bank_name))
                                                            <option selected value="1">{{ $user->account_name }} - {{ $user->bank_name }} - {{ $user->account_number }}</option>
                                                            @endif
                                                        </select>
                                                        <div class="help-block"></div>

                                                    </div>
                                                </div>

                                                <div class="text-center"><button type="submit" class="btn btn-primary">XÁC NHẬN RÚT TIỀN</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="danger"><i class="fa fa-warning danger"></i> Lưu ý rút tiền</h2>
                                            <ol class="list-note">
                                                <li>Thời gian dịch vụ rút tiền hoạt động: 24/24.</li>
                                                <li>Cùng một tài khoản ngân hàng, hạn mức rút tiền mỗi ngày là 20 lần.</li>
                                                <li>Điều kiện để rút tiền cần đặt cược đủ số tiền đã nạp, nếu không đủ lượng đặt cược sẽ không thể rút tiền. Ví dụ, nạp 100.000, cần đặt cược đủ 100.000 yêu cầu rút tiền sẽ thông qua.</li>
                                                <li>Thẻ ngân hàng bắt buộc trùng với tên chủ thẻ đã đăng ký và sử dụng tên thật để rút tiền.</li>
                                                <li>Sau khi yêu cầu rút tiền hoàn thành, tiền sẽ đến tài khoản của hội viên trong vòng 1 phút.</li>
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


    <form id="form_back" action="{{ route('withdraw') }}" method="GET" style="display: none;"></form>

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

            $("#show_hide_password button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });

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