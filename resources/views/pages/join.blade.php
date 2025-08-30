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
    <title>THE VIP - Inscreva-se agora</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
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
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/components.css') }}?v=1.2">

    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" href="{{ asset('vuexy5.4/assets/css/style.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=3">
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

                <section>
                    <!-- list -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content block-info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 col-md-6">ID : <span class="session_id">{{ $item->session_id }}</span></div>
                                            <div class="col-8 col-md-6 text-right">Número de ciclos : <span class="so_ky">{{ date('Ymd', strtotime($item_new->time_created)) }} - {{ $item_new->session_id }}</span></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-6 col-md-6 d-md-none d-flex">Saldo Total : <span class="text-balance">{{ number_format($user->balance) }}</span></div>
                                            <div class="col-6 col-md-12 text-right timer">
                                                <span class="txt-hour">00</span>
                                                <span class="txt-minute">{{ $minute < 10 ? '0'.$minute : $minute }}</span>
                                                <span class="txt-second">{{ $second < 10 ? '0'.$second : $second }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-6 d-md-flex d-none">Número : <span class="number_id">{{ $item->number }}</span></div>
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
                                                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tabc-1" aria-controls="tabc-1" role="tab" aria-selected="false"><span>SALA 1</span></a>
                                                        </li>
                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                            
                                                            <a class="nav-link" id="tab-2" data-toggle="tab" href="#tabc-2" aria-controls="tabc-2" role="tab" aria-selected="true"><span>NAMORO</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tabc-1" aria-labelledby="tab-1" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-xl-6 list_gao">
                                                            
                                                            <div class="row mb-1">
                                                                <div class="col-6 col-sm-6">
                                                                    <h3 style="margin-top: 5px;">Lista de produtos</h3>
                                                                </div>
                                                               <div class="col-6 col-sm-6 text-right">
                                                                <a href="{{ route('history_bet') }}" class="btn btn-gao btn-join glow mb-0 mb-sm-0 mr-0">HISTÓRICO DE PARTICIPAÇÃO</a>
                                                               </div>
                                                            </div>
                                                            @foreach ($list_gao as $key => $value)
                                                            <div class="row">
                                                                <div class="col-12 col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-3 col-lg-3 col-xl-3 text-center">
                                                                                    <img class="fluid-img" src="https://admin.sclmvip.club/uploads/category/{{ $value->image }}" alt="">
                                                                                </div>
                                                                                <div class="col-7 col-md-9 col-lg-9 col-xl-9">
                                                                                    <h3>{{ $value->title }}</h3>
                                                                                    <p class="mb-0">{{ $value->description }}</p>
                                                                                    <p class="mb-0">{{ $value->price }}đ</p>
                                                                                    <div class="row mt-1">
                                                                                        <div class="col-12 col-md-12">
                                                                                            <button type="button" class="btn-export btn btn-gao glow">EXPORTAR</button>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12" style="margin-top: 5px">
                                                                                            <button type="button" class="btn-import btn btn-gao glow">IMPORTAR</button>
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
                                                                            <a class="nav-link active" id="tab-11" data-toggle="tab" href="#tabc-11" aria-controls="tabc-11" role="tab" aria-selected="true">ÚLTIMOS RESULTADOS</a>
                                                                        </li>
                                                                        <li class="nav-item col-6 col-md-6 text-center">
                                                                            <a class="nav-link" id="tab-12" data-toggle="tab" href="#tabc-12" aria-controls="tabc-12" role="tab" aria-selected="false">ÚLTIMA CONFIRMAÇÃO</a>
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
											    <div class="tab-pane active" id="tabc-2" aria-labelledby="tab-2" role="tabpanel">
                                                    
                                                    <div class="row">
                                                        
                                                          <div class="col-12 col-sm-6 mx-auto">
                                                              <div class="row">
                                                                <div class="col-6 col-md-6 text-center">
                                                                    <button type="button" class="btn-export btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">O DESEJO A</button>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-center">
                                                                    <button type="button" class="btn-import btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">O DESEJO B</button>
                                                                </div>
                                                            </div>
                                                          </div>
                                                    </div>    
                                                    <div style="display:none" class="row mt-1">
                                                        
                                                          <div class="col-12 col-sm-6 mx-auto">
                                                              <div class="row">
                                                                <div class="col-6 col-md-6 text-center">
                                                                    <button type="button" class="btn-export btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">ĐIỀU ƯỚC C</button>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-center">
                                                                    <button type="button" class="btn-import btn btn-gao glow mb-0 mb-sm-0 mr-0 mr-sm-1">ĐIỀU ƯỚC D</button>
                                                                </div>
                                                            </div>
                                                          </div>
                                                    </div>   
                                                    <div class="row mt-2">
                                                          <div class="col-12 col-sm-12 text-center">
                                                            <a href="{{ route('history_bet') }}" class="btn btn-primary btn-join glow mb-0 mb-sm-0 mr-0">HISTÓRICO DE PARTICIPAÇÃO</a>
                                                          </div>
                                                    </div>      
                                                    <div class="row mt-2 pb-5">
                                                        
                                                          <div class="col-12 col-sm-6 mx-auto">
                                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                                  <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_1.jpg') }}" alt="First slide">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_2.jpg') }}" alt="Second slide">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_3.jpg') }}" alt="Third slide">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_4.jpg') }}" alt="Third slide">
                                                                    </div>
                                                                     <div class="carousel-item">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_5.jpg') }}" alt="Third slide">
                                                                    </div>
                                                                     <div class="carousel-item">
                                                                      <img class="d-block w-100" src="{{ asset('images/photo_6.jpg') }}" alt="Third slide">
                                                                    </div>
                                                                  </div>
                                                                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                  </a>
                                                                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                  </a>
                                                                </div>
                                                              
                                                          </div>
                                                    </div>
                                                </div>
                                                <!-- /tab-pane -->
 
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
    @include(
        'pages.subpages.footer'
    )
    <!-- END: Content-->

    <div class="modal fade text-left" id="create-project-id-modal" tabindex="-1" role="dialog" aria-labelledby="projectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md create-project-id-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal">IMPORTAR</h4>
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
                                    <input type="text" autocomplete="off" id="txt-money" name="txt-money" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="20" class="btn-value btn btn-outline-primary">R$ 20</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="30" class="btn-value btn btn-outline-primary">R$ 30</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="50" class="btn-value btn btn-outline-primary">R$ 50</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="200" class="btn-value btn btn-outline-primary">R$ 200</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="300" class="btn-value btn btn-outline-primary">R$ 300</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="500" class="btn-value btn btn-outline-primary">R$ 500</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="2.000" class="btn-value btn btn-outline-primary">R$ 2.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="3.000" class="btn-value btn btn-outline-primary">R$ 3.000</button></div>
                                    <div class="col-4 col-sm-4 text-center"><button type="button" data-value="5.000" class="btn-value btn btn-outline-primary">R$ 5.000</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">CANCELAR</button>
                                <button type="button" id="btn-confirm" class="btn btn-primary">CONFIRMAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade text-left" id="prize-modal" tabindex="-1" role="dialog" aria-labelledby="prizeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md prize-modal" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form-notice" action="{{ route('form_notice') }}" method="POST">
                        @csrf
                        <div class="card mb-0" style="box-shadow:none">
                          <div class="card-body p-1">
                              <div class="row">
                                  <div class="col-12 col-sm-4"><img class="card-img-top" src="{{ asset('images/thantai.webp') }}" alt=""></div>
                                  <div class="col-12 col-sm-8"><h5 class="card-title mt-2" style="color:#E42728">Parabéns por receber um envelope de dinheiro da sorte no valor de R$ {{ number_format($user->prize_amount) }}</h5></div>
                              </div>
                             <div class="row mt-2">
                            <div class="col-12 col-sm-12">
                             <div class="form-check">
                                <input type="checkbox" style="margin-top: 7px;" name="close" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Desativar a exibição de notificações</label>
                              </div>
                              </div>
                              </div>
                            <div class="row mt-1">
                                <div class="col-12 col-sm-12 text-right">
                                    <button type="button" id="btn-notice" class="btn btn-primary">OK</button>
                                </div>
                            </div>
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
        
        function numberWithCommas(number) {
          var parts = number.toString().split(".");
          parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          return parts.join(".");
        }
      
        $(function() {
           
            @if($user->is_notice)
            setTimeout(function(){ 
              	 $('#prize-modal').modal('show');
             }, 500);
            @endif
            var times = parseInt("{{ $times }}");
            times--;
            var timerFnc = function() {
                if (times == 0) {
                    // times = 180;
                    Swal.fire({
                        title: '',
                        html: 'Iniciar nova sessão',
                        type: 'warning',
                        showCancelButton: false,
                        // showConfirmButton: true,
                        timer: 500
                    }).then(function(result) {
                        // searchData($('#form-search'), function(data) {
                        //     $('.session_id').html(data[0].session_id);
                        //     $('.so_ky').html(data[0].time_created + ' - ' + data[0].session_id);
                        //     $('.number_id').html(data[0].number);
                        //     var rs = data[0].result;
                        //     $('.txt-num-1').html(rs.substring(0, 1));
                        //     $('.txt-num-2').html(rs.substring(1, 2));
                        //     $('.txt-num-3').html(rs.substring(2, 3));
                        //     $('.txt-num-4').html(rs.substring(3, 4));
                        //     $('.txt-num-5').html(rs.substring(4, 5));
                        //     times = data[0].times;
                        // });
                        window.location.reload();
                    });
                }
                var m = Math.floor(times / 60);
                var s = times % 60;
                $('.txt-minute').html(m < 10 ? '0' + m : m);
                $('.txt-second').html(s < 10 ? '0' + s : s);
                times--;
            };
            setInterval(timerFnc, 1000);
            
             $(document).on('keypress', '#txt-money', function(event) {
                if(event.which !=8 && isNaN(String.fromCharCode(event.which))){
                  event.preventDefault();
                }
    
             });
    
             $(document).on('keyup', '#txt-money', function() {
                var num = $(this).val();
                num = num.replaceAll(".", "");
                var commaNum = numberWithCommas(num);
                $(this).val(commaNum);
             })

            $(document).on('click', '.btn-export', function() {
                $('#hdType').val(1);
                $("#projectModal").html('EXPORTAR');
                $('#create-project-id-modal').modal('show');
                $('#txt-money').val('');
            });
            $(document).on('click', '.btn-import', function() {
                $('#hdType').val(2);
                $("#projectModal").html('IMPORTAR');
                $('#create-project-id-modal').modal('show');
                $('#txt-money').val('');
            });
            var d = 10000;
            $(document).on('click', '.btn-plus', function() {
                var m = $('#txt-money').val();
                m = m.replaceAll(".", "");
                if (!isNumeric(m)) {
                    m = parseInt(d);
                } else {
                    m = parseInt(m) + parseInt(d);
                }
                var commaNum = numberWithCommas(m);
                $('#txt-money').val(commaNum);
            });
            $(document).on('click', '.btn-minus', function() {
                var m = $('#txt-money').val();
                m = m.replaceAll(".", "");
                if (!isNumeric(m)) {
                    m = 0;
                } else {
                    m = parseInt(m) - parseInt(d);
                }

                if (m < 0) {
                    m = 0;
                }
                var commaNum = numberWithCommas(m);
                $('#txt-money').val(commaNum);
            });

            $(document).on('click', '.btn-value', function() {
                var m = $('#txt-money').val();
                m = m.replaceAll(".", "");
                var a = $(this).attr('data-value');
                // console.log(a);
                a = a.replaceAll(".", ""); 
                // console.log(a);
                if (!isNumeric(m)) {
                    m = parseInt(a);
                } else {
                    m = parseInt(m) + parseInt(a);
                }
                var commaNum = numberWithCommas(m);
                $('#txt-money').val(commaNum);
            });
            
            $(document).on('click', '#btn-notice', function() {
                updateData($('#form-notice'), false, function(result) {
                    $('#prize-modal').modal('hide');
                });
            });


            $(document).on('click', '#btn-confirm', function() {
                updateData($('#form-bet'), false, function(result) {
                    showResultMessage(result.message, false);
                    $('#create-project-id-modal').modal('hide');
                    $('.text-balance').html(result.balance);

                });
            });

        });
    </script>
</body>
<!-- END: Body-->

</html>