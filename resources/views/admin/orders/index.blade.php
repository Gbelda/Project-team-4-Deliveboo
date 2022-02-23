@extends('layouts.admin')

@section('content')

<div class="container" id="ordini">

    <h1 class="text-center section_title">ORDINI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    
    <table class="table dash_container">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Indirizzo</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Totale</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr >
                <td scope="row">{{ $order->client_name}}</td>
                <td>{{ $order->client_lastname}}</td>
                <td>{{ $order->client_address}}</td>
                <td>{{$order->client_phone}}</td>
                <td>{{$order->client_email}}</td>
                <td>{{ $order->total}}</td>
                <td >
                    <div class="d-flex justify-content-around">
                        <a class="btn show_btn" href="{{ route('admin.orders.show', $order->id) }}"><i class="fas fa-eye"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn delete_btn" data-bs-toggle="modal"
                            data-bs-target="#deleteplate{{ $order->id }}">
                            <i class="fas fa-trash fa-lg fa-fw"></i>
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteplate{{ $order->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modal_{{ $order->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete order</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Stai per cancellare definitivamente l'ordine, sei sicuro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('admin.plates.destroy', $order->id) }}" method="post">
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
    
@endsection