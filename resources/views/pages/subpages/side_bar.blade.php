<ul class="nav flex-column">
    <li class="nav-item {{ $index == 0 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 0 ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i>下注回合
        </a>
    </li>
    <li class="nav-item {{ $index == 1 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 1 ? 'active' : '' }}" href="{{ route('lottery') }}">
            <i class="fa fa-tag"></i>彩票管理
        </a>
    </li>
    <li class="nav-item {{ $index == 2 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 2 ? 'active' : '' }}" href="{{ route('deposit') }}">
            <i class="fa fa-money"></i>存款历史
        </a>
    </li>
    <li class="nav-item {{ $index == 7 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 7 ? 'active' : '' }}" href="{{ route('withdraw') }}">
            <i class="fa fa-money"></i>提款历史
        </a>
    </li>
    <li class="nav-item {{ $index == 3 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 3 ? 'active' : '' }}" href="{{ route('user') }}">
            <i class="fa fa-users"></i>用户管理
        </a>
    </li>
    <li class="nav-item {{ $index == 4 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 4 ? 'active' : '' }}" href="{{ route('bank') }}">
            <i class="fa fa-bank"></i>银行管理
        </a>
    </li>
    <li class="nav-item {{ $index == 5 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 5 ? 'active' : '' }}" href="{{ route('setting') }}">
            <i class="fa fa-gears"></i>环境
        </a>
    </li>
    <li class="nav-item {{ $index == 6 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 6 ? 'active' : '' }}" href="{{ route('bet') }}">
            <i class="fa fa-gamepad"></i>投注历史
        </a>
    </li>


    <li class="nav-item mr-2 mt-1 mb-1 d-md-none d-flex">
        <a style="margin-left: 5px;" class="btn btn-danger" href="{{route('logout')}}"><i class="feather icon-power"></i> 登出</a>
    </li>
</ul>