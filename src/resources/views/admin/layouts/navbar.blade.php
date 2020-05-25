<!-- Navigation Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item align-self-center">
            <img src="{{ Auth::user()->avatar }}" class="d-inline-block rounded-circle" id="userAvatar" alt="" height="35">
        </li>
        <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->getNameInitials() }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if(Auth::user()->isManager())
                <a class="dropdown-item" href="{{ route('home') }}">Панель менеджера</a>
                @endif
                <a class="dropdown-item" href="{{ route('user:profile') }}">Профіль</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Вихід</a>
            </div>
        </li>
    </ul>
</nav>
<!-- Navigation End -->
