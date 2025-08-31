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
    <title>GAO WEB - Trang chủ</title>
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
  <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ date('YmdHis')}}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}"></head>
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu" data-open="click" data-menu="horizontal-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <nav class="navbar navbar-expand-md  fixed-top navbar-dark fixed-top bg-dark bgheader">
        <a class="navbar-brand" href="{{ route('home') }}">GAO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                <section>
                    <!-- list -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content block-info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 col-md-6">ID : <span class="session_id">{{ $item->session_id }}</span></div>
                                            <div class="col-8 col-md-6 text-right">Số kỳ : <span class="so_ky">{{ date('Ymd', strtotime($item->time_created)) }} - {{ $item->session_id }}</span></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-6 col-md-6 d-md-none d-flex">Số dư : <span class="text-balance">{{ number_format($user->balance) }}</span></div>
                                            <div class="col-6 col-md-12 text-right timer">
                                                <span class="txt-hour">00</span>
                                                <span class="txt-minute">{{ $minute < 10 ? '0'.$minute : $minute }}</span>
                                                <span class="txt-second">{{ $second < 10 ? '0'.$second : $second }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-6 d-md-flex d-none">Number : <span class="number_id">{{ $item->number }}</span></div>
                                            <div class="col-12 col-md-6 text-right number">
                                                <span class="txt-num-1">{{ substr($item->result,0,1) }}</span>
                                                <span class="txt-num-2">{{ substr($item->result,1,1) }}</span>
                                                <span class="txt-num-3">{{ substr($item->result,2,1) }}</span>
                                                <span class="txt-num-4">{{ substr($item->result,3,1) }}</span>
                                                <span class="txt-num-5">{{ substr($item->result,4,1) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="search_result">
                        <div class="row" id="tabpanel">
                            <div class="col-12">
                                <div class="card overflow-hidden mb-0">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12 block-room">
                                                    <ul class="nav nav-tabs row" role="tablist">
                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tabc-1" aria-controls="tabc-1" role="tab" aria-selected="true"><span>PHÒNG 1</span></a>
                                                        </li>
                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                            <a class="nav-link" id="tab-2" data-toggle="tab" href="#tabc-2" aria-controls="tabc-2" role="tab" aria-selected="false"><span>HẸN HÒ</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tabc-1" aria-labelledby="tab-1" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-xl-6 list_gao">
                                                            <h1>Gạo ngon Việt Nam</h1>
                                                            @foreach ($list_gao as $key => $value)
                                                            <div class="row">
                                                                <div class="col-12 col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-3 col-lg-3 col-xl-3 text-center">
                                                                                    <img class="fluid-img" src="{{ asset('images/gao_'.($key + 1).'.png') }}" alt="">
                                                                                </div>
                                                                                <div class="col-7 col-md-9 col-lg-9 col-xl-9">
                                                                                    <h3>{{ $value['name'] }}</h3>
                                                                                    <p class="mb-0">Khối lượng: {{ $value['weight'] }}</p>
                                                                                    <p class="mb-0">{{ $value['price'] }}đ</p>
                                                                                    <div class="row mt-1">
                                                                                        <div class="col-6 col-md-3 col-lg-2 col-xl-3 col-xl-3">
                                                                                            <button type="button" class="btn-export btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">XUẤT</button>
                                                                                        </div>
                                                                                        <div class="col-6 col-md-3 col-lg-2 col-xl-3 col-xl-3">
                                                                                            <button type="button" class="btn-import btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">NHẬP</button>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6 col-lg-8 col-xl-6 col-xl-6">
                                                                                            <button type="button" class="btn-contact btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">LH NHÀ CUNG CẤP</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-12 col-md-12 col-xl-6">
                                                            <div class="row prize">
                                                                <div class="col-12 col-md-12">
                                                                    <ul class="nav nav-tabs" role="tablist">
                                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                                            <a class="nav-link active" id="tab-11" data-toggle="tab" href="#tabc-11" aria-controls="tabc-11" role="tab" aria-selected="true">MỞ THƯỞNG GẦN NHẤT</a>
                                                                        </li>
                                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                                            <a class="nav-link" id="tab-12" data-toggle="tab" href="#tabc-12" aria-controls="tabc-12" role="tab" aria-selected="false">XÁC NHẬN GẦN NHẤT</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="tabc-11" aria-labelledby="tab-11" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-12 block-prize-1">
                                                                            @include(
                                                                            'pages.subpages.prize_1',
                                                                            [
                                                                            '$item_last' => $item_last ?? [],
                                                                            ]
                                                                            )
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /tab-pane -->
                                                                <div class="tab-pane" id="tabc-12" aria-labelledby="tab-12" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-12 block-prize-2">
                                                                            @include(
                                                                            'pages.subpages.prize_2',
                                                                            [
                                                                            '$item_bet' => $item_bet ?? [],
                                                                            ]
                                                                            )
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /tab-pane -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <img style="width:100%" class="img-fluid" src="{{ asset('images/make.jpg') }}" alt="">
                                                    </div>
                                                </div><!-- /tab-pane -->
                                                <div class="tab-pane" id="tabc-2" aria-labelledby="tab-2" role="tabpanel">
                                                    <div class="row p-3">
                                                        <div class="col-6 col-md-6 text-center">
                                                            <button type="button" class="btn-export btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">ĐIỀU ƯỚC 1</button>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-center">
                                                            <button type="button" class="btn-import btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">ĐIỀU ƯỚC 2</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12 col-md-6">
                                                            <img style="width: 100%;height: 532px;" class="img-fluid" src="{{ asset('images/make1.jpg') }}" alt="">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <img style="width: 100%;height: 532px;" class=" img-fluid" src="{{ asset('images/make2.jpg') }}" alt="">
                                                        </div>
            
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12 col-md-6">
                                                            <img style="width: 100%;height: 532px;" class=" img-fluid" src="{{ asset('images/make3.jpg') }}" alt="">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <img style="width: 100%;height: 532px;" class=" img-fluid" src="{{ asset('images/make4.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div><!-- /tab-pane -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade text-left" id="create-project-id-modal" tabindex="-1" role="dialog" aria-labelledby="projectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md create-project-id-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal">Số Lượng Đơn Xuất</h4>
                </div>
                <div class="modal-body">
                    <form id="form-bet" action="{{ route('form_bet') }}" method="POST">
                        @csrf
                        <input type="hidden" id="hdType" name="type" value="1" />
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="number" id="txt-money" name="txt-money" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="20000" class="btn-value btn btn-outline-primary">20.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="30000" class="btn-value btn btn-outline-primary">30.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="50000" class="btn-value btn btn-outline-primary">50.000</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="200000" class="btn-value btn btn-outline-primary">200.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="300000" class="btn-value btn btn-outline-primary">300.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="500000" class="btn-value btn btn-outline-primary">500.000</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="2000000" class="btn-value btn btn-outline-primary">2.000.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="3000000" class="btn-value btn btn-outline-primary">3.000.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="5000000" class="btn-value btn btn-outline-primary">5.000.000</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">HUỶ</button>
                                <button type="button" id="btn-confirm" class="btn btn-primary">XÁC NHẬN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <form id="form-search" action="{{ route('last_session') }}" method="POST" style="display: none;"></form>

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
                    times = 180;
                    Swal.fire({
                        title: '',
                        html: 'Bắt đầu phiên mới',
                        type: 'warning',
                        showCancelButton: false,
                        // showConfirmButton: true,
                        timer: 1000
                    }).then(function(result) {
                        searchData($('#form-search'), function(data) {
                            $('.session_id').html(data[0].session_id);
                            $('.so_ky').html(data[0].time_created + ' - ' + data[0].session_id);
                            $('.number_id').html(data[0].number);
                            var rs = data[0].result;
                            $('.txt-num-1').html(rs.substring(0, 1));
                            $('.txt-num-2').html(rs.substring(1, 2));
                            $('.txt-num-3').html(rs.substring(2, 3));
                            $('.txt-num-4').html(rs.substring(3, 4));
                            $('.txt-num-5').html(rs.substring(4, 5));
                        });
                    });
                }
                var m = Math.floor(times / 60);
                var s = times % 60;
                $('.txt-minute').html(m < 10 ? '0' + m : m);
                $('.txt-second').html(s < 10 ? '0' + s : s);
                times--;
            };
            setInterval(timerFnc, 1000);

            $(document).on('click', '.btn-export', function() {
                $('#hdType').val(1);
                $("#projectModal").html('Số Lượng Đơn Xuất');
                $('#create-project-id-modal').modal('show');
                $('#txt-money').val('');
            });
            $(document).on('click', '.btn-import', function() {
                $('#hdType').val(2);
                $("#projectModal").html('Số Lượng Đơn Nhập');
                $('#create-project-id-modal').modal('show');
                $('#txt-money').val('');
            });
            var d = 10000;
            $(document).on('click', '.btn-plus', function() {
                var m = $('#txt-money').val();
                if (!isNumeric(m)) {
                    m = parseInt(d);
                } else {
                    m = parseInt(m) + parseInt(d);
                }
                $('#txt-money').val(m);
            });
            $(document).on('click', '.btn-minus', function() {
                var m = $('#txt-money').val();
                if (!isNumeric(m)) {
                    m = 0;
                } else {
                    m = parseInt(m) - parseInt(d);
                }

                if (m < 0) {
                    m = 0;
                }
                $('#txt-money').val(m);
            });

            $(document).on('click', '.btn-value', function() {
                var m = $('#txt-money').val();
                var a = $(this).attr('data-value');
                if (!isNumeric(m)) {
                    m = parseInt(a);
                } else {
                    m = parseInt(m) + parseInt(a);
                }
                $('#txt-money').val(m);
            });


            $(document).on('click', '#btn-confirm', function() {
                updateData($('#form-bet'), false, function(result) {
                    showResultMessage(result.message, false);
                    $('#create-project-id-modal').modal('hide');
                    $('.text-balance').html(result.balance);

                });
                // updateData($('#form-bet'), false);
            });

        });
    </script>
</body>
<!-- END: Body-->

</html>