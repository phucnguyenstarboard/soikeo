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
    <title>GAO ADMIN - 主页</title>
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
    <nav class="navbar navbar-expand-md  fixed-top navbar-dark fixed-top bg-dark bgheader">
        <a class="navbar-brand" href="{{ route('home') }}">ADMIN</a>
        <button class="navbar-toggler btn-sidebar" type="button">
            <span class="navbar-toggler-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false" style="color: #fff;">
                    <title>Menu</title>
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto"></div>
            <div class="form-inline my-2 my-lg-0 form-m-header">
                @include(
                'pages.subpages.menu'
                )
            </div>
        </div>
    </nav>
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
                        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                            <div class="sidebar-sticky pt-3">
                                @include(
                                'pages.subpages.side_bar',
                                [
                                'index' => 0
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>当前会话代码 : <span class="session_id">{{ $item->session_id }}</span></h4>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-12 col-md-12 text-center number">
                                                    <span class="txt-num-1">{{ substr($item->result,0,1) }}</span>
                                                    <span class="txt-num-2">{{ substr($item->result,1,1) }}</span>
                                                    <span class="txt-num-3">{{ substr($item->result,2,1) }}</span>
                                                    <span class="txt-num-4">{{ substr($item->result,3,1) }}</span>
                                                    <span class="txt-num-5">{{ substr($item->result,4,1) }}</span>
                                                </div>
                                            </div>
                                            <h4>下一个会话代码 : <span class="session_id_next">{{ $item->session_id + 1 }}</span></h4>
                                            <h4 class="mt-2">倒计时时间</h4>
                                            <div class="row mt-1 mb-2">
                                                <div class="col-12 col-md-12 text-center timer">
                                                    <span class="txt-hour">00</span>
                                                    <span class="txt-minute">{{ $minute < 10 ? '0'.$minute : $minute }}</span>
                                                    <span class="txt-second">{{ $second < 10 ? '0'.$second : $second }}</span>
                                                </div>
                                            </div>
                                            <h4 class="mt-2">改变下一轮的结果</h4>
                                            <form action="{{ route('post_profile') }}" id="form-profile" method="POST" novalidate>
                                                @csrf
                                                <div class="row mt-2 mb-2">
                                                    <div class="col-12 col-md-12 text-center number">
                                                        <input type="text" class="digitsOnly" name="num_1" maxlength="1" />
                                                        <input type="text" class="digitsOnly" name="num_2" maxlength="1" />
                                                        <input type="text" class="digitsOnly" name="num_3" maxlength="1" />
                                                        <input type="text" class="digitsOnly" name="num_4" maxlength="1" />
                                                        <input type="text" class="digitsOnly" name="num_5" maxlength="1" />
                                                    </div>
                                                </div>
                                                <div class="text-center"><button type="submit" class="btn btn-primary">更新</button></div>
                                            </form>
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

    <form id="form_back" action="{{ route('home') }}" method="GET" style="display: none;"></form>
    <form id="form-search" action="{{ route('home') }}" method="GET" style="display: none;"></form>

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
        function isNumeric(str) {
            if (typeof str != "string") return false // we only process strings!  
            return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
                !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
        }
        $(function() {
            var times = parseInt("{{ $times }}");
            times--;
            var timerFnc = function() {
                if (times == 0) {
                    // times = 180;
                    searchData($('#form-search'), function(data) {
                        // $('.session_id').html(data[0].session_id);
                        // $('.session_id_next').html(parseInt(data[0].session_id) + 1);
                        // var rs = data[0].result;
                        // $('.txt-num-1').html(rs.substring(0, 1));
                        // $('.txt-num-2').html(rs.substring(1, 2));
                        // $('.txt-num-3').html(rs.substring(2, 3));
                        // $('.txt-num-4').html(rs.substring(3, 4));
                        // $('.txt-num-5').html(rs.substring(4, 5));
                        window.location.reload();
                    });
                    // 
                }
                var m = Math.floor(times / 60);
                var s = times % 60;
                $('.txt-minute').html(m < 10 ? '0' + m : m);
                $('.txt-second').html(s < 10 ? '0' + s : s);
                times--;
            };
            setInterval(timerFnc, 1000);
        });
    </script>
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

            jQuery('.digitsOnly').keypress(function(event) {
                if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                    event.preventDefault();
                }
                console.log(event.which);

            });

            $(".btn-sidebar").on('click', function(event) {
                $('#sidebarMenu').toggle({
                    direction: "left"
                }, 10);
            });
        });
    </script>
</body>
<!-- END: Body-->

</html>