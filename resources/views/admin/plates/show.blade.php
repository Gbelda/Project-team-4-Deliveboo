@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center section_title">PIATTO: {{ $plate->name }}</h1>
        <div class="card-group" id="show_plate">
            <div class="d-flex">
                <div class="col-6">
                    <img class="card-img-top" src="{{ asset('/storage/' . $plate->image) }}" alt="">
                </div>
                <div class="col-6 right_col">
                    <div class="card_info">
                        <h4 class="card-title">{{ $plate->name }}</h4>
                        <span class="">DESCRIZIONE</span>
                        <p class="card-text text_desc">{{ $plate->description }}</p>
                        <span class="">INGREDIENTI</span>
                        <p class="card-text text_ingredients">{{ $plate->ingredients }}</p>
                        <span class="">DISPONIBILITÀ</span>
                        <p class="card-text text-ava">{{ $plate->available != 0 ? 'Disponibile' : 'Non disponibile' }}</p>
                        <span class="">PREZZO</span>
                        <p class="card-text card_price">{{ $plate->price }} &euro;</p>
                    </div>
                </div>
            </div>
            @auth
                <div class="actions d-flex justify-content-between">
                    <a class="btn" href="{{ route('admin.plates.index') }}">Torna all'admin</a>
                    <a class="btn" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
