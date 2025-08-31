 <ul class="navbar-nav">
     <li class="nav-item mr-2">
         <a href="{{ route('home') }}" style="color:#fff"><i class="feather icon-user"></i> {{ $user->account }} </a>
     </li>
     <li class="nav-item mr-2 mt-1 mb-1">
         <a class="btn btn-danger" href="{{route('logout')}}"><i class="feather icon-power"></i> ĐĂNG XUẤT</a>
     </li>
 </ul>