<nav class="navbar navbar-expand-md shadow" >
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" wire:navigate>Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('usuarios')) active @endif" aria-current="page" href="{{ route('usuarios') }}" wire:navigate>Usuarios</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('emisoras')) active @endif" aria-current="page" href="{{ route('emisoras') }}" wire:navigate>Emisoras</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('grupos.*')) active @endif" aria-current="page" href="{{ route('grupos.index') }}" wire:navigate>Grupos</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('funciones')) active @endif" aria-current="page" href="{{ route('funciones.index') }}" wire:navigate>Funciones</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('tipo_programas')) active @endif" aria-current="page" href="{{ route('tipo_programas') }}" wire:navigate>TProgramas</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('tipo_guiones')) active @endif" aria-current="page" href="{{ route('tipo_guiones') }}" wire:navigate>TGuiones</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('clasificaciones')) active @endif" aria-current="page" href="{{ route('clasificaciones') }}" wire:navigate>Clasificaciones</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('programas')) active @endif" aria-current="page" href="{{ route('programas') }}" wire:navigate>Programas</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  {{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>

                </li>
                <li class="nav-item align-items-center d-flex" >
                    <i class="fas fa-sun"></i>
                    <!-- Default switch -->
                    <div class="ms-2 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="themingSwitcher" />
                    </div>
                    <i class="fas fa-moon"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>

