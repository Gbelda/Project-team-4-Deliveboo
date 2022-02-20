@extends('layouts.spa')

@section('page_js')
    <script src="https://js.braintreegateway.com/web/3.85.2/js/client.min.js" defer></script>
    <script src="https://js.braintreegateway.com/web/3.85.2/js/hosted-fields.min.js" defer></script>
    <script src="{{ asset('js/checkout.js') }}" defer></script>
@endsection

@section('page_css')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endsection

@section('app')
    <div class="container checkout_container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <form class="needs-validation" action="{{ route('checkout.store') }}" id="user_info" method="POST">
                @csrf

                <div class="row justtify-content-evenly">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Carrello</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3" id="cart_list">
                        </ul>


                    </div>

                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Indirizzo di Consegna</h4>


                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="client_name">Nome</label>
                                <input type="text" class="form-control" id="client_name" placeholder="" required
                                    name="client_name">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="client_lastname">Cognome</label>
                                <input type="text" class="form-control" id="client_lastname" placeholder="" value="" required
                                    name="client_lastname">
                            </div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="client_email">Email</label>
                            <input type="email" class="form-control" id="client_email" placeholder="Esempio@dominio.it" required
                                name="client_email">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="client_address">Indirizzo</label>
                            <input type="text" class="form-control" id="client_address" placeholder="Via/Piazza" required
                                name="client_address">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="client_phone">Numero di Tel.</label>
                            <input type="number" class="form-control" id="client_phone" placeholder="Cellulare/Telefono fisso." required
                                name="client_phone" pattern="[0-9]{10}"
                                        oninvalid="this.setCustomValidity('Inserire un numero di telefono')"
                                        oninput="this.setCustomValidity('')">
                        </div>

                        <hr class="mb-4">

                    </div>

                </div>
                <div class="cc_container row">
                    <header>
                        <h1>Carta di Credito</h1>
                    </header>

                    <div id="my-sample-form" class="scale-down">
                        <div class="cardinfo-card-number">
                            <label class="cardinfo-label" for="card-number">Numero carta</label>
                            <div class='input-wrapper' id="card-number"></div>
                            <div id="card-image"></div>
                        </div>

                        <div class="cardinfo-wrapper">
                            <div class="cardinfo-exp-date">
                                <label class="cardinfo-label" for="expiration-date">Scadenza</label>
                                <div class='input-wrapper' id="expiration-date"></div>
                            </div>

                            <div class="cardinfo-cvv">
                                <label class="cardinfo-label" for="cvv">CVV</label>
                                <div class='input-wrapper' id="cvv"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <input type="button" value=""> --}}
                <input name="payment_method_nonce" id="nonce" type="hidden">
                <input id="button-pay" type="button" value="Paga" />
            </form>


        </div>
    @endsection
