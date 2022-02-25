@extends('layouts.admin')
@section('page_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" defer></script>
    <script src="{{ asset('js/chart.js') }}" defer></script>
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center">Statistiche</h1>
        <canvas id="myChartBar" class="mb-5"></canvas>
        <canvas id="myChartLine"></canvas>
    </div>
@endsection
