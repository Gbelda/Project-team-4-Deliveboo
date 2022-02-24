@extends('layouts.admin')

@section('content')
    <div class="container" id="Stats">

        <h1 class="text-center section_title">Statistiche</h1>
        <div class="chart">
            <div class="d-flex">
                <ul class="AsseY list-unstyled d-flex flex-column-reverse">
                    @foreach ($orders as $order)
                        <li class="d-flex">
                            <p>{{ $order->created_at->format('m-Y')}}</p>
                            <div class="point"></div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="vl"></div>
            </div>


        </div>
        <div class="AsseX">
            <div class="orizontal"></div>
            <div class="ms-6">
                @foreach ($orders as $order)
                <div class="point"></div>
                    <span>{{ $order->total }} €</span>
                @endforeach
            </div>
        </div>


    </div>
@endsection
