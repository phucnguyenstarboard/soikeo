
  @php
     $total_r =  (int)session()->get('total_r');
     session()->forget('total_r');
  @endphp
  <nav class="navbar navbar-expand-md  fixed-top navbar-dark fixed-top bg-dark bgheader">
        <a class="navbar-brand" href="{{ route('home') }}">THE RICE</a>
        <a href="{{ route('notify') }}" class="dk-sp" style="color:#fff;font-size: 1.5rem;position: relative;">
            <i class="fa fa-bell mr-1"></i>
            @if($total_r > 0 && !Route::is('notify') )
            <span style="position: absolute;top: -4px;right: 5px;background: #ff0000;height: 20px;width: 20px;text-align: center;border-radius: 50%;font-size: 13px;padding: 2px;">{{ $total_r }}</span>
            @endif
        </a>
        <button class="navbar-toggler" style="font-size: 1.5rem;color: #fff;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather icon-user"></i> {{ $user->account }}
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto"></div>
            <div class="form-inline my-2 my-lg-0 form-m-header">
                 <ul class="navbar-nav">
                     <li class="nav-item mr-2">
                         <a href="{{ route('notify') }}" class="dk-pc" style="color:#fff;position: relative;">
                            <i class="fa fa-bell mr-1"></i>
                            @if($total_r > 0 && !Route::is('notify') )
                            <span style="position: absolute;top: -6px;right: 9px;background: #ff0000;height: 15px;width: 15px;text-align: center;border-radius: 50%;font-size: 11px;padding: 2px;">{{ $total_r }}</span>
                            @endif
                         </a>
                         <a href="{{ route('profile') }}" style="color:#fff"><i class="feather icon-user"></i> {{ $user->account }} </a>
                     </li>
                     <li class="nav-item mr-2">
                         <i class="fa fa-money"></i> Số dư : <span class="text-balance">{{ number_format($user->balance) }}</span>
                     </li>
                     <li class="nav-item mr-2 mt-1 mb-1">
                         <a class="btn btn-primary" href="{{ route('deposit') }}"><i class="fa fa-plus-square"></i> NẠP</a>
                     </li>
                     <li class="nav-item mr-2 mt-1 mb-1">
                         <a class="btn btn-warning" href="{{ route('withdraw') }}"><i class="fa fa-minus-square"></i> RÚT</a>
                     </li>
                     <li class="nav-item mr-2 mt-1 mb-1">
                         <a class="btn btn-dark" href="{{ route('password_fund') }}"><i class="feather icon-lock"></i> MẬT KHẨU QUỸ</a>
                     </li>
                     <li class="nav-item mr-2 mt-1 mb-1">
                         <a class="btn btn-danger" href="{{route('logout')}}"><i class="feather icon-power"></i> ĐĂNG XUẤT</a>
                     </li>
                 </ul>
            </div>
        </div>
    </nav>