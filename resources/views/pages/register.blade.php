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
    <title>THE VIP - Cadastrar</title>
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

    <link rel="stylesheet" href="{{ asset('vuexy5.4/app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" href="{{ asset('vuexy5.4/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{date('YmdHis')}}">
    <!-- END: Custom CSS-->
</head>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  menu-collapsed blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-12 col-12 p-0">
                                    <div class="card rounded-0 pb-1 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title text-center">
                                                <h2 class="mb-0">Cadastrar</h2>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{ route('post_register') }}" id="form-register" method="POST" novalidate>
                                                    @csrf
                                                   
                                                    <div class="form-label-group form-group position-relative has-icon-left">
                                                        <div class="controls">
                                                            <input type="text" class="form-control" id="account" name="account" placeholder="Nome da conta" required
                                                                data-validation-required-message="Por favor, insira o nome da conta" maxlength="255"
                                                                value="">
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="account">Nome da conta</label>
                                                    </div>

                                                    <div class="form-label-group form-group position-relative has-icon-left">
                                                        <div class="controls">
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required
                                                                data-validation-required-message="Por favor, digite a senha" maxlength="255"
                                                                value="">
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="password">Senha</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button style="width:100%" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Criar conta</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-2 mb-1">
                                                            <a style="width:100%" href="{{ route('login') }}" class="btn btn-outline-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Entrar</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
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

    <form id="form_back" action="{{ route('login') }}" method="GET" style="display: none;"></form>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vuexy5.4/app-assets/vendors/js/vendors.min.js') }}"></script>
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
            if ($("#form-register").attr("novalidate") != undefined) {
                // Input, Select, Textarea validations except submit button
                $("#form-register").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
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
        });
    </script>
</body>
<!-- END: Body-->

</html>