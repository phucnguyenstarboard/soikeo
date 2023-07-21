<!DOCTYPE html>
<html>
<head>
    <title>Trang quản lý</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Roboto, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .loading {
            position: relative;
            overflow: hidden;
            pointer-events: none;
        }
        .loading .loading__overlay {
            content: '';
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            cursor: wait;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 999999;
        }
        .loading .loading__icon {
            content: '';
            width: 5%;
            height: 5%;
            min-width: 50px;
            min-height: 50px;
            background-image: url('../assets/images/loading-icon.svg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            right: 0;
            left: 0;
            transform: translateY(-50%);
        }        
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/loading-overlay.js"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="{{ Auth::check() ? 'container-fluid' : 'container' }}">
        <a class="navbar-brand" href="/" target="_blank" >ONBET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><b>Đăng nhập</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><b>Đăng ký</b></a>
                    </li> -->
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tour') }}"><b>Giải đấu</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><b>Trận đấu</b></a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
                    </li>
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
     
</body>
</html>