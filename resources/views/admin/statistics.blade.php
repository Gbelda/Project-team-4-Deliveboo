<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    <!-- Scripts -->

    {{-- @yield('page_js') --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                <a id="ordini" href="{{ route('admin.orders.index') }}">
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
                            <li class="piatti">
                                <div class="hide">
                                    <h6>
                                        statistiche
                                    </h6>
                                </div>
                                <a href="{{ route('admin.statistics') }}">
                                    <i class="fas fa-chart-pie"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="contenuto_griglie">
                    <div class="row flex-wrap">
                        <div class="col-12 pb-5">
                            <div class="panel panel-default d-flex justify-content-center">
                                <h1 class="panel-heading my-2 col-12">Statistiche mensile degli ordini</h1>
                                <div class="col-lg-8">
                                    <canvas id="monthlyChart" class="rounded shadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 pt-5">
                            <div class="panel panel-default d-flex justify-content-center">
                                <h1 class="panel-heading my-2 col-12">Statistiche annuale degli ordini</h1>
                                <div class="col-lg-8">
                                    <canvas id="yearlyChart" class="rounded shadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- CHARTS -->
    <script>
        var monthly = document.getElementById('monthlyChart').getContext('2d');
        var chart = new Chart(monthly, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!! json_encode($monthlyChart->labels) !!},
                datasets: [{
                    label: 'Revenue per mese',
                    backgroundColor: {!! json_encode($monthlyChart->colours) !!},
                    data: {!! json_encode($monthlyChart->dataset) !!},
                }, ]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });

        var yearly = document.getElementById('yearlyChart').getContext('2d');
        var chart = new Chart(yearly, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!! json_encode($yearlyChart->labels) !!},
                datasets: [{
                    label: 'Revenue per anno',
                    backgroundColor: {!! json_encode($yearlyChart->colours) !!},
                    data: {!! json_encode($yearlyChart->dataset) !!},
                }, ]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>
</body>

</html>
