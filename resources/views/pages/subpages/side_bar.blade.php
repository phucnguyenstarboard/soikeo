<ul class="nav flex-column">
    <li class="nav-item d-md-none d-flex">
        <button class="navbar-toggler btn-sidebar" type="button">
            <span class="navbar-toggler-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false" style="color: #000;">
                    <title>Menu</title>
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
            </span>
        </button>
    </li>
    <li class="nav-item {{ $index == 0 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 0 ? 'active' : '' }}" href="{{ route('profile') }}">
            THÔNG TIN NGƯỜI DÙNG
        </a>
    </li>
    <li class="nav-item {{ $index == 1 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 1 ? 'active' : '' }}" href="{{ route('deposit') }}">
            NẠP
        </a>
    </li>
    <li class="nav-item {{ $index == 2 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 2 ? 'active' : '' }}" href="{{ route('withdraw') }}">
            RÚT
        </a>
    </li>
    <li class="nav-item {{ $index == 3 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 3 ? 'active' : '' }}" href="{{ route('history_bet') }}">
            LỊCH SỬ THAM GIA
        </a>
    </li>
    <li class="nav-item {{ $index == 4 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 4 ? 'active' : '' }}" href="{{ route('history_transaction') }}">
            LỊCH SỬ GIAO DỊCH
        </a>
    </li>
    <li class="nav-item {{ $index == 5 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 5 ? 'active' : '' }}" href="{{ route('bank') }}">
            QUẢN LÝ TÀI KHOẢN RÚT TIỀN
        </a>
    </li>
    <li class="nav-item {{ $index == 6 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 6 ? 'active' : '' }}" href="{{ route('password_fund') }}">
            MẬT KHẨU QUỸ
        </a>
    </li>
    <li style="display: none;" class="nav-item {{ $index == 7 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 7 ? 'active' : '' }}" href="{{ route('history_chat') }}">
            LỊCH SỬ LIÊN HỆ
        </a>
    </li>
</ul>