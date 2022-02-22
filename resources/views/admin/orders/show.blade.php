@extends('layouts.admin')

@section('content')
    
<div class="card-group">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $order->client_name}}</h4>
            <p class="card-text">{{ $order->client_lastname}}</p>
            <p class="card-text">{{ $order->client_address}}</p>
            <p class="card-text">{{$order->client_phone}}</p>
            <p class="card-text">{{$order->client_email}}</p>
            <p class="card-text">{{ $order->total}}</p>
            @auth
            <div class="actions">
                <a href="{{route('admin.orders.index')}}">Back to Admin</a>
            </div>
            @endauth
        </div>
    </div>


@endsection