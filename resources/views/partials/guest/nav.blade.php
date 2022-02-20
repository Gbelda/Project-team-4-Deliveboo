<nav id="nav_guest" class="container-fluid">
<div class="nav_guest container d-flex justify-content-between align-items-center">
<div class="nav_guest container d-flex justify-content-between align-items-center">
        <div class="col-2">
            <router-link to="/" class="nav-link"><img src="{{ asset('./img/jumbo/logo.png') }}" alt="">
            </router-link>
        </div>
        <div class="hamburgen">
            <div class="dropdown">
                <button class="button_navbar btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Sei un ristorante?
                </button>
                <ul class="dropdown-menu tendina" aria-labelledby="dropdownMenuButton1">
                    @guest
                        <li class="nav-item nav_link">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item nav_link">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registra') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
            {{-- <i class="fa-solid fa-bars"></i> --}}
        </div>
</nav>
