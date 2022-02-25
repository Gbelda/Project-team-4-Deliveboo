@extends('layouts.admin')
@section('content')
    <div class="card-group w-25">
        <div class="card">
            <div class="card-body">
                Nome Cliente: {{ $order->client_name }} {{ $order->client_lastname }},<br>
                Indirizzo: {{ $order->client_address }} <br>
                Indirizzo e-mail: {{ $order->client_email }} <br>
                <br>
                <hr>
                # Ordine: {{ $order->id }}<br>
                @foreach ($order->plates as $plate)
                    Piatto: {{ $plate->name }} <br>
                    Prezzo: &euro;{{ $plate->price }} <br>
                    Quantit&aacute;: x{{ $plate->pivot->quantity }}<br>
                @endforeach
                <hr>
                Prezzo Totale: &euro;{{ $order->total }}
                @auth
                    <div class="actions">
                        <a class="btn bgc-brand" href="{{ route('admin.orders.index') }}">←</a>
                    </div>
                @endauth
            </div>
        </div>
    @endsection
