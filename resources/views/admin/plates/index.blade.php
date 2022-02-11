@extends('layouts.admin')

@section('content')

    @include('partials.admin.dashboard')

    <div class="container">

        <h1>I tuoi Piatti</h1>
        <a href="{{ route('admin.plates.create') }}" role="button" class="btn btn-dark">Aggiungi un nuovo Piatto</a>
        @foreach ($plates as $plate)
            <div class="card-group">
                <div class="card col-2">
                    <img class="card-img-top w-25" src="{{ asset('/storage/' . $plate->image) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $plate->name }}</h4>
                        <p class="card-text">{{ $plate->description }}</p>
                        <p class="card-text">{{ $plate->ingredients }}</p>
                        <p class="card-text">{{ $plate->price }} &euro;</p>
                        <p class="card-text">
                            @if ($plate->available === 1)
                                Disponibile

                            @else
                                Non disponibile
                            @endif
                        </p>
                        <a href="{{ route('admin.plates.show', $plate->id) }}">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection
