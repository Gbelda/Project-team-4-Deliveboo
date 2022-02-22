@extends('layouts.admin')

@section('content')
    
<div class="container">

    <h1>Gli Ordini dei tuoi clienti</h1>
    @foreach ($orders as $order)
    <div class="card-group">
        <div class="card col-6">
            <div class="card-body">
                <h4 class="card-title">{{ $order->client_name}}</h4>
                <p class="card-text">{{ $order->client_lastname}}</p>
                <p class="card-text">{{ $order->client_address}}</p>
                <p class="card-text">{{$order->client_phone}}</p>
                <p class="card-text">{{$order->client_email}}</p>
                <p class="card-text">{{ $order->total}}</p>

                <a href="{{ route('admin.orders.show', $order->id) }}"><i class="fas fa-eye"></i></a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post">

                    <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                        data-bs-target="#deleteorder{{ $order->id }}">
                        <i class="fas fa-trash fa-lg fa-fw"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteorder{{ $order->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modal_{{ $order->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancellare Ordine {{ $order->client_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Stai per cancellare definitivamente questo ordine, sei sicuro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post">
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