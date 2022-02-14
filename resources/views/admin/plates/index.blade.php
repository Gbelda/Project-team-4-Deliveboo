@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>I tuoi Piatti</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

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
                        <a href="{{ route('admin.plates.edit', $plate->id) }}">Modify</a>
                        <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post">

                            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                data-bs-target="#deleteplate{{ $plate->id }}">
                                <i class="fas fa-trash fa-lg fa-fw"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteplate{{ $plate->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal_{{ $plate->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete plate {{ $plate->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Stai per cancellare definitivamente il piatto, sei sicuro?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection
