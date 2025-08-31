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
    <title>THE RICE - Quản lý tài khoản rút tiền</title>
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
                                'index' => 5
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6">
                                    <div class="card">
                                        <div class="card-body" style="margin-bottom: 0.45rem;">
                                            <h1><i class="fa fa-bank"></i> Cập nhật tài khoản rút tiền</h1>
                                            <div class="form-group row mb-0 mt-2">
                                                <div class="col-12 col-sm-12">
                                                    <button type="button" class="btn btn-danger btn-show-modal"> <i class="fa fa-bank"></i> CẬP NHẬT TÀI KHOẢN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            @if(!empty($user->bank_name))
                                            <h3 style="color:#007bff">{{ $user->bank_name }}</h3>
                                            <h1>{{ $user->account_number }}</h1>
                                            <h4>Tên: {{ $user->account_name }}</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="warning"><i class="fa fa-warning warning"></i> Lưu ý</h2>
                                            <ol class="list-note">
                                                <li>Sau khi tài khoản rút tiền được thêm thành công, Tài khoản rút tiền hoàn chính của bạn sẽ không xuất hiện trong bất kỳ khu vực nào của nền tảng này.</li>
                                                <li>Mỗi tài khoản thành viên có thể thêm tối đa 2 Tài khoản rút tiền.</li>
                                                <li>Mỗi tài khoản thành viên chỉ được phép thêm vào Tài khoản rút tiền cùng họ và tên.</li>
                                                <li>Trước khi thêm tài khoản rút tiền, trước tiên bạn phải cài đặt Mật khẩu QUỸ.</li>
                                                <li>Sau khi thêm tài khoản rút tiền, bạn có thể đăng ký rút tiền.</li>
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
    <form id="form_back" action="{{ route('bank') }}" method="GET" style="display: none;"></form>

    <div class="modal fade text-left" id="create-project-id-modal" tabindex="-1" role="dialog" aria-labelledby="projectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal">Cập nhật tài khoản rút tiền</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post_bank') }}" id="form-profile" method="POST" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Loại tài khoản</label>
                            <div class="col-8 col-sm-9">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" checked="checked" class="custom-control-input">
                                    <label class="custom-control-label col-form-label" style="padding: 0rem;margin-top:1rem" for="customRadioInline1">Thẻ ngân hàng</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Tên ngân hàng</label>
                            <div class="col-8 col-sm-9">
                                <select required
                                    data-validation-required-message="Vui lòng chọn ngân hàng" class="form-control" id="cbxBank" name="bank_name">
                                    <option value="">Chọn ngân hàng</option>
                                    @foreach ($banks as $key => $value)
                                    <option {{ $key == $user->bank_name ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Chi nhánh</label>
                            <div class="col-8 col-sm-9">
                                <input required
                                    data-validation-required-message="Vui lòng nhập chi nhánh" type="text" name="branch" maxlength="255" class="form-control" value="{{ $user->branch }}">
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Tên tài khoản</label>
                            <div class="col-8 col-sm-9">
                                <input required
                                    data-validation-required-message="Vui lòng nhập tên tài khoản" type="text" name="account_name" maxlength="255" class="form-control" value="{{ $user->account_name }}">
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">Số tài khoản</label>
                            <div class="col-8 col-sm-9">
                                <input required
                                    data-validation-required-message="Vui lòng nhập số tài khoản" type="text" name="account_number" maxlength="255" class="form-control" value="{{ $user->account_number }}">
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">HUỶ</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">XÁC NHẬN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
            $(document).on('click', '.btn-show-modal', function() {
                $('#create-project-id-modal').modal('show');
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