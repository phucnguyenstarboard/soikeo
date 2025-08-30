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
            Informações do perfil
        </a>
    </li>
    <li class="nav-item {{ $index == 1 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 1 ? 'active' : '' }}" href="{{ route('deposit') }}">
            DEPOSITAR
        </a>
    </li>
    <li class="nav-item {{ $index == 2 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 2 ? 'active' : '' }}" href="{{ route('withdraw') }}">            
            SOLICITAR SAQUE
        </a>
    </li>
    <li class="nav-item {{ $index == 3 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 3 ? 'active' : '' }}" href="{{ route('history_bet') }}">
            HISTÓRICO DE PARTICIPAÇÃO
        </a>
    </li>
    <li class="nav-item {{ $index == 4 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 4 ? 'active' : '' }}" href="{{ route('history_transaction') }}">
            HISTÓRICO DE TRANSAÇÕES
        </a>
    </li>
    <li class="nav-item {{ $index == 5 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 5 ? 'active' : '' }}" href="{{ route('bank') }}">
            CONTA DE SAQUE
        </a>
    </li>
    <li class="nav-item {{ $index == 6 ? 'active' : '' }}">
        <a class="nav-link {{ $index == 6 ? 'active' : '' }}" href="{{ route('password_fund') }}">
            SENHA DO FUNDO
        </a>
    </li>
</ul>