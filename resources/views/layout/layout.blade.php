<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Onbet Soi Kèo</title>
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('assets/css/font-awesome.min.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"  rel="shortcut icon"/>
        <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet"/>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"  class="library"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}" class="library"></script>
        <!-- start menu -->
        <script type="text/javascript" src="{{ asset('assets/js/megamenu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.leanModal.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/easyResponsiveTabs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/move-top.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/easing.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.validation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/syshelper.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootbox.min.js') }}" class="library"></script>
        <style>
            a {
            color: #FF910C;
            }
        </style>
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}" >
        <script type="application/x-javascript"> 
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
        </script>        
    </head>
    <body>
        @include('layout.header')

            @yield('content')

        @include('layout.footer')
        
        @stack('js')
    </body>
</html>
