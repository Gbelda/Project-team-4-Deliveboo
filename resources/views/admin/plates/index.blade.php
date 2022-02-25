@extends('layouts.admin')
@section('content')
    <div class="container">

        <h1 class="text-center section_title">I TUOI PIATTI</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <table class="table dash_container">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Immagine</th>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plates as $plate)
                    <tr>
                        <td scope="row">{{ $plate->id }}</td>
                        <td><img width="100" src="{{ asset('/storage/' . $plate->image) }}" alt="{{ $plate->name }}">
                        </td>
                        <td>{{ $plate->name }}</td>
                        <td>{{ $plate->price }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <a class="btn show_btn" href="{{ route('admin.plates.show', $plate->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn edit_btn" href="{{ route('admin.plates.edit', $plate->id) }}"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn delete_btn" data-bs-toggle="modal"
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
                                                <form action="{{ route('admin.plates.destroy', $plate->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="cont_btn_add_plate mb-5">
        <a href="{{ route('admin.plates.create') }}" role="button" class="btn btn_add_plate">Aggiungi un nuovo Piatto</a>
    </div>
@endsection
