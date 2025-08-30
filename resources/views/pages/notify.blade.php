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
    <title>THE VIP - Notificação</title>
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
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" href="{{ asset('vuexy5.4/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1">
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
                                'index' => -1
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1>Notificação</h1>
                                            @php
                                              $is_data = false;
                                            @endphp
                                            <ul class="list-group list-group-flush">
                                                @foreach ($data_list as $item)
                                                    @php
                                                        $date = $item->time_updated;
                                                        if(!empty($date)){
                                                            $tz1 = 'UTC';
                                                            $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                                            $findme = '(';
                                                            $pos = strpos($date, $findme );
                                                            if ($pos !== false) {
                                                                $date = substr($date,0, $pos);
                                                            }
                                                            $d_update1 = new DateTime($date, new DateTimeZone($tz1));
                                                            $d_update1->setTimeZone(new DateTimeZone($tz2));
                                                            $d_update = $d_update1->format('Y-m-d H:i:s');
                                                            $d_update2 = $d_update1->format('d/m/Y H:i:s');
                                                        }
                                                    @endphp
                                                @if(strtotime($d_update) > strtotime(date('2025-08-04 00:00:00')))
                                                <li class="d-flex justify-content-between align-items- p1-1">
                                                    <div class="media text-inherit mt-1">
                                                        <div class="media-body">
                                                            <p class="mb-0 text-truncate-2">
                                                                @if((int)$item->status === 2)
                                                                <span style="color: #ff0000;font-weight: 700;">Pedido de saque rejeitado</span>
                                                                @else
                                                                <span style="color: #1e8c4f;font-weight: 700;">Saques aprovada</span>
                                                                @endif
                                                                 {{ !empty($item->note) ? ': '.$item->note : '' }}
                                                            </p>
                                                            <small class="text-muted">
                                                            {{ $d_update2 }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </li>
                                                @php
                                                  $is_data = true;
                                                @endphp
                                                @endif
                                                @endforeach

                                                @if(!$is_data)
                                                 <p style="text-align: center;">Nenhuma notificação</p>
                                                @endif

                                            </ul>
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