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
    <title>THE RICE - Lịch sử giao dịch</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.min.css') }}">
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
                                'index' => 4
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile">
                            <div class="card block-search">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <div class="heading-elements visible mb-1">
                                            <ul class="list-inline mb-0">
                                                <li class="align-middle"><a data-action="collapse">Tìm kiếm <i class="feather icon-chevrons-up"></i></a></li>
                                            </ul>
                                        </div>
                                    </h4>
                                </div>
                                <div class="card-content collapse">
                                    <div class="card-body">
                                        <div>
                                            <form id="form-search" action="{{ route('post_history_transaction') }}" method="POST" novalidate="">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-sm-4 col-lg-3">
                                                        <label for="s-ordered_date_s">Ngày</label>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control datepicker" value="{{ date('d/m/Y') }}" placeholder="dd/mm/yyyy" name="s-fromdate">
                                                            <div class="help-block"></div>
                                                        </fieldset>
                                                    </div>
                                                    <!-- <div class="col-12 col-sm-4 col-lg-3">
                                                        <label for="s-ordered_date_s">Đến ngày</label>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control datepicker" value="{{ date('d/m/Y') }}" placeholder="dd/mm/yyyy" name="s-todate">
                                                            <div class="help-block"></div>
                                                        </fieldset>
                                                    </div> -->
                                                    <div class="col-12 col-sm-4 col-lg-3">
                                                        <label for="s-m_user_id">Mã giao dịch</label>
                                                        <fieldset class="">
                                                            <input type="text" class="form-control" value="" name="s-code">
                                                            <!-- <select class="form-control" id="" name="s-status">
                                                                <option value="0">Tất cả trạng thái</option>
                                                                <option value="1">Thắng cược</option>
                                                                <option value="2">Thua cược</option>
                                                            </select> -->
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-4 col-lg-3">
                                                        <div class="d-flex flex-sm-row flex-column justify-content-start mt-2">
                                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">Tìm kiếm</button>
                                                            <button type="reset" class="btn btn-outline-warning mb-1 mb-sm-0 mr-0 mr-sm-1 reset waves-effect waves-light">Nhập lại</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- list -->
                            <div id="search_result">
                                @include('pages.subpages.transaction_list',[
                                'data_list' => $item_bet,
                                'from' => $from,
                                'to' => $to
                                ])
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

    <form id="form-search" action="{{ route('last_session') }}" method="POST" style="display: none;"></form>

    <!-- BEGIN: Vendor JS-->
    <script src=" {{ asset('/vuexy5.4/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendors/datepicker-en.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('vuexy5.4/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('vuexy5.4/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <!-- END: Theme JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/ajax.js') }}"></script>

    <!-- END: Page JS-->
    <script>
        var dt_index_1;
        $(document).ready(function() {
            $(".btn-sidebar").on('click', function(event) {
                $('#sidebarMenu').toggle({
                    direction: "left"
                }, 100);
            });

            // DatePicker
            $('.datepicker').datepicker();
            initDataTable();
        });

        (function(window, document, $) {
            'use strict';

            if ($("#form-search").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-search").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                        searchData($('#form-search'), function(data) {
                            reloadDataTable(data);
                        });
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        })(window, document, jQuery);

        function reloadDataTable(result) {
            dt_index_1.destroy();;
            $('#search_result').html(result);
            initDataTable();
        }

        function initDataTable() {
            dt_index_1 = $('.t1-datatable').DataTable({
                lengthChange: false,
                displayLength: 10,
                ordering: false,
                searching: false,
                paginate: true,
                info: false,
                scrollX: true,
                columnDefs: [{
                        targets: 0,
                        width: 180
                    },
                    {
                        targets: 1,
                        width: 120
                    },
                    {
                        targets: 2,
                        width: 100
                    },
                    {
                        targets: 3,
                        width: 140
                    },
                    {
                        targets: 4,
                        width: 120
                    },
                    {
                        targets: 5,
                        width: 110
                    },
                    {
                        targets: 6,
                        width: 150
                    },
                ],
            });
        }
    </script>
</body>
<!-- END: Body-->

</html>