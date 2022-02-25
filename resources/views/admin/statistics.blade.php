@extends('layouts.admin')
@section('page_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" defer></script>
    <script src="{{ asset('js/chart.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Statistiche</h1>
        <h2 class="text-center">Statistiche ordini ricevuti</h2>
        <canvas id="chartBarOrders" class="mb-5"></canvas>
        <canvas id="chartLineOrders" class="mb-5"></canvas>

        <h2 class="text-center">Statistiche ricavato</h2>
        <canvas id="chartBarSales" class="mb-5"></canvas>
        <canvas id="chartLineSales"></canvas>
    </div>
@endsection
