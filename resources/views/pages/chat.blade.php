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
    <title>THE RICE - Liên hệ</title>
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

                <section class="mt-4">
                   
                    <div class="container contact">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <div class="card">
                                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Để lại tin nhắn cho chúng tôi
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('post_chat') }}" id="form-chat" enctype="multipart/form-data" method="POST" novalidate>
                                                @csrf
                                            <p>Hê thống CSKH đang bảo trì, quý khách vui lòng để lại số điện thoại liên lạc và lời nhắn. Xin cảm ơn !!! </p>
                                            <div class="form-group">
                                                <label class="required" for="name">Số điện thoại</label>
                                                <input type="text" maxlength="10" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required data-validation-required-message="Vui lòng nhập số điện thoại">
                                                <div class="help-block"></div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="required" for="message">Nội dung</label>
                                                <textarea class="form-control" id="message" name="message" placeholder="Viết lời nhắn"  rows="4" required required data-validation-required-message="Vui lòng nhập lời nhắn"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="controls">
                                                <label for="manual">Ảnh đính kèm (tối đa 5MB)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input"
                                                            accept="image/*"
                                                        >
                                                        <label class="custom-file-label" for="manual">Chọn ảnh</label>
                                                    </div>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="mx-auto mt-2">
                                                 <button type="submit" class="btn btn-primary text-right mb-2">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
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

    <form id="form_back" action="{{ route('chat') }}" method="GET" style="display: none;"></form>

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

    <script>
        function initValidation() {
            if ($("#form-chat").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-chat").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateDataFile($form, true);
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