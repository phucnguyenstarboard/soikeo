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
    <title>VIP ADMIN - 用户管理</title>
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
                                'index' => 3
                                ]
                                )
                            </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-4 profile block-bank">
                            <h3>用户管理</h3>
                            <div class="card block-search">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <div class="heading-elements visible mb-1">
                                            <ul class="list-inline mb-0">
                                                <li class="align-middle"><a data-action="collapse">搜索 <i class="feather icon-chevrons-up"></i></a></li>
                                            </ul>
                                        </div>
                                    </h4>
                                </div>
                                <div class="card-content collapse">
                                    <div class="card-body">
                                        <div>
                                            <form id="form-search" action="{{ route('user_search') }}" method="POST" novalidate="">
                                                @csrf
                                                <div class="row">                                                    
                                                    <div class="col-12 col-sm-4 col-lg-3">
                                                        <label for="s-ordered_date_s">帐户名称</label>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control" value="" name="s-account">
                                                            <div class="help-block"></div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-4 col-lg-3">
                                                        <div class="d-flex flex-sm-row flex-column justify-content-start mt-2">
                                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">搜索</button>
                                                            <button type="reset" class="btn btn-outline-warning mb-1 mb-sm-0 mr-0 mr-sm-1 reset waves-effect waves-light">重新输入</button>
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
                                @include('pages.subpages.user_list',[
                                'data_list' => $user_list
                                ])
                            </div>

                        </main>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <form id="form_back" action="{{ route('user') }}" method="GET" style="display: none;"></form>
    <form id="form_update" action="{{ route('user_delete') }}" method="POST" style="display: none;">
        <input type="hidden" class="hdId" name="user_id" value="">
    </form>

    <div class="modal fade text-left" id="create-project-id-modal" tabindex="-1" role="dialog" aria-labelledby="projectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal">Cài đặt tài khoản ngân hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_profile') }}" id="form-profile" method="POST" novalidate>
                        @csrf
                        <input type="hidden" class="hdId" value="0" name="user_id" />
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">用户名</label>
                            <div class="col-8 col-sm-9">
                                <input required
                                    data-validation-required-message="This is required" type="text" id="username" name="username" maxlength="255" class="form-control" value="">
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">帐户名称</label>
                            <div class="col-8 col-sm-9">
                                <input required
                                    data-validation-required-message="This is required" type="text" id="account" name="account" maxlength="255" class="form-control" value="">
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">取消</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="create-project-id-modal2" tabindex="-1" role="dialog" aria-labelledby="projectModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal2" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal2">Cài đặt tài khoản ngân hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_password') }}" id="form-profile-2" method="POST" novalidate>
                        @csrf
                        <input type="hidden" class="hdId" value="0" name="user_id" />
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">新密码</label>
                            <div class="col-8 col-sm-9">
                                <div class="input-group" id="show_hide_password">
                                    <input required="" data-validation-required-message="This is required" type="password" name="password" maxlength="255" class="form-control" value="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary waves-effect waves-light" type="button"><i class="fa fa-eye-slash dark"></i></button>
                                    </div>
                                </div>
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">确认密码</label>
                            <div class="col-8 col-sm-9">
                                <div class="input-group" id="show_hide_password_2">
                                    <input required="" data-validation-required-message="This is required" type="password" name="password_confirm" maxlength="255" class="form-control" value="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary waves-effect waves-light" type="button"><i class="fa fa-eye-slash dark"></i></button>
                                    </div>
                                </div>
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">取消</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="create-project-id-modal3" tabindex="-1" role="dialog" aria-labelledby="projectModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal3" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal3">Cài đặt tài khoản ngân hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_fun_pass') }}" id="form-profile-3" method="POST" novalidate>
                        @csrf
                        <input type="hidden" class="hdId" value="0" name="user_id" />
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">确认密码</label>
                            <div class="col-8 col-sm-9">
                                <div class="input-group" id="show_hide_password">
                                    <input required="" data-validation-required-message="This is required" type="password" name="fund_password" maxlength="255" class="form-control" value="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary waves-effect waves-light" type="button"><i class="fa fa-eye-slash dark"></i></button>
                                    </div>
                                </div>
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">确认密码</label>
                            <div class="col-8 col-sm-9">
                                <div class="input-group" id="show_hide_password_2">
                                    <input required="" data-validation-required-message="This is required" type="password" name="fund_password_confirm" maxlength="255" class="form-control" value="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary waves-effect waves-light" type="button"><i class="fa fa-eye-slash dark"></i></button>
                                    </div>
                                </div>
                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">取消</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="create-project-id-modal4" tabindex="-1" role="dialog" aria-labelledby="projectModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal4" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal4">Cài đặt tài khoản ngân hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_balance') }}" id="form-profile-4" method="POST" novalidate>
                        @csrf
                        <input type="hidden" class="hdId" value="0" name="user_id" />
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">数量</label>
                            <div class="col-8 col-sm-9">

                                <input required="" data-validation-required-message="This is required" type="number" name="balance" maxlength="255" class="form-control" value="" aria-invalid="false">

                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">取消</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
        <div class="modal fade text-left" id="create-project-id-modal5" tabindex="-1" role="dialog" aria-labelledby="projectModal5" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-project-id-modal5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="projectModal5">Cài đặt tài khoản ngân hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_prize') }}" id="form-profile-5" method="POST" novalidate>
                        @csrf
                        <input type="hidden" class="hdId" value="0" name="user_id" />
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-4 col-sm-3 col-form-label">数量</label>
                            <div class="col-8 col-sm-9">

                                <input required="" data-validation-required-message="This is required" type="number" name="prize_amount" maxlength="255" class="form-control" value="" aria-invalid="false">

                                <div class="help-block"></div>

                            </div>
                        </div>

                        <div class="row mt-3 mb-1">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary mr-2">取消</button>
                                <button type="submit" id="btn-confirm" class="btn btn-primary">确认</button>
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

            $(document).on('click', '.btn-confirm-2', function() {
                var status = $(this).attr('data-status');
                $(".hdId").val($(this).attr('data-id'));

                if (status == 1) {
                    $('#create-project-id-modal').modal('show');
                    $("#projectModal").html('编辑信息 : ' + $(this).attr('data-account'));
                    $("#username").val($(this).attr('data-username'));
                    $("#account").val($(this).attr('data-account'));

                } else if (status == 2) {
                    $('#create-project-id-modal2').modal('show');
                    $("#projectModal2").html('设置新密码 : ' + $(this).attr('data-account'));
                } else if (status == 3) {
                    $('#create-project-id-modal3').modal('show');
                    $("#projectModal3").html('设置新的资金密码 : ' + $(this).attr('data-account'));
                } else if (status == 4) {
                    $('#create-project-id-modal4').modal('show');
                    $("#projectModal4").html('输入新余额 : ' + $(this).attr('data-account'));
                } else if (status == 6) {
                    $('#create-project-id-modal5').modal('show');
                    $("#projectModal5").html('输入奖金 : ' + $(this).attr('data-account'));
                } else if (status == 5) {

                    var m = '您确定要删除成员吗 [ ' + $(this).attr('data-account') + ' ]？';
                    Swal.fire({
                        title: '确认删除会员',
                        html: m,
                        type: 'warning',
                        showCancelButton: true,
                        showConfirmButton: true,
                        confirmButtonText: "确认",
                        cancelButtonText: "取消",
                    }).then(function(result) {
                        if (result['dismiss'] === undefined) {
                            updateData($('#form_update'), false, function(data) {
                                Swal.fire({
                                    title: '',
                                    html: '会员帐号删除成功',
                                    type: 'success',
                                    showCancelButton: false,
                                    // showConfirmButton: false,
                                    // timer: 1000
                                }).then(function(result) {
                                    searchData($('#form-search'), function(data) {
                                        reloadDataTable(data);
                                    });
                                });

                            });
                        }
                    });
                }

            });

            // DatePicker
            // $('.datepicker').datepicker();
            initDataTable();
            initValidation1();
            initValidation2();
            initValidation3();
            initValidation4();
            initValidation5();

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

            $("#show_hide_password_2 button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password_2 input').attr("type") == "text") {
                    $('#show_hide_password_2 input').attr('type', 'password');
                    $('#show_hide_password_2 i').addClass("fa-eye-slash");
                    $('#show_hide_password_2 i').removeClass("fa-eye");
                } else if ($('#show_hide_password_2 input').attr("type") == "password") {
                    $('#show_hide_password_2 input').attr('type', 'text');
                    $('#show_hide_password_2 i').removeClass("fa-eye-slash");
                    $('#show_hide_password_2 i').addClass("fa-eye");
                }
            });
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
            dt_index_1 = $('.t2-datatable').DataTable({
                lengthChange: false,
                displayLength: 10,
                ordering: false,
                searching: false,
                paginate: false,
                info: false,
                scrollX: true,
                columnDefs: [{
                        targets: 0,
                        width: 40
                    },
                    {
                        targets: 1,
                        width: 330
                    },
                    {
                        targets: 2,
                        width: 180
                    },
                    {
                        targets: 3,
                        width: 150
                    },
                    {
                        targets: 4,
                        width: 180
                    },
                    {
                        targets: 5,
                        width: 200
                    },
                    {
                        targets: 6,
                        width: 120
                    },
                    {
                        targets: 7,
                        width: 120
                    },
                ],
            });
        }

        function initValidation1() {
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

        function initValidation2() {
            if ($("#form-profile-2").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-profile-2").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateData($form, true);
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        }

        function initValidation3() {
            if ($("#form-profile-3").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-profile-3").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateData($form, true);
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        }

        function initValidation4() {
            if ($("#form-profile-4").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-profile-4").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateData($form, true);
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        }
        
        function initValidation5() {
            if ($("#form-profile-5").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-profile-5").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                    submitSuccess: function($form, event) {
                        updateData($form, true);
                        // will not trigger the default submission in favor of the ajax function
                        event.preventDefault();
                    },
                    submitError: function($form, event, errors) {},
                });
            }
        }
    </script>
</body>
<!-- END: Body-->

</html>