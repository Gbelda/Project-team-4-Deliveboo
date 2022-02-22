<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        @include('partials.admin.nav')


        <section class="container-fluid" id="contenuto_admin">
            <div class="row">
                <div class="side_bar ">
                    <div class="side_bar_contenitor">
                        <ul>
                            <li class="dash">
                                <div class="hide">
                                    <h6>
                                        dashboard
                                    </h6>
                                </div>
                                <a id="dash" href="{{ route('admin.index') }}">
                                    <i class="fa-solid fa-chart-line"></i>
                                </a>
                            </li>
                            <li class="ordini">
                                <div class="hide">
                                    <h6>
                                        ordini
                                    </h6>
                                </div>
                                <a id="ordini" href="#">
                                    <i class="fa-solid fa-clipboard"></i>
                                </a>
                            </li>
                            <li class="piatti">
                                <div class="hide">
                                    <h6>
                                        piatti
                                    </h6>
                                </div>
                                <a id="piatti" href="{{ route('admin.plates.index') }}">
                                    <i class="fa-solid fa-utensils"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="contenuto_griglie">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
</body>

</html>
