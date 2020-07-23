<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link text-white font-weight-bold" href="{{ route('home') }}">Головна</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('user.profile') }}">Профіль</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('order.create') }}">Створити заяву</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item align-self-center">
            <img src="{{ Auth::user()->avatar }}" class="d-inline-block rounded-circle" id="userAvatar" alt="" height="35">
        </li>
        <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->getNameInitials() }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if(Auth::user()->isManager())
                    <a class="dropdown-item" href="{{ route('home') }}">Панель менеджера</a>
                @endif
                <a class="dropdown-item" href="{{ route('user.profile') }}">Профіль</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Вихід</a>
            </div>
        </li>
    </ul>
</nav>
