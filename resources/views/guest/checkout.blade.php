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

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>


            </div>

            <div class="col-md-8 order-md-1">
                <div class="form-container">

                    <h4 class="mb-3">Indirizzo di Consegna</h4>
                    <form class="needs-validation" action="#">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nome</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                    required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Cognome</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Esempio@dominio.it">
                        </div>

                        <div class="mb-3">
                            <label for="address">Indirizzo</label>
                            <input type="text" class="form-control" id="address" placeholder="Via/Piazza" required="">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number">Numero di Tel.</label>
                            <input type="number" class="form-control" id="phone_number" placeholder="+39" required="">
                        </div>

                        <hr class="mb-4">


                    </form>

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



                    <input id="button-pay" type="submit" value="Continue" />
                </div>
            </div>
        </div>
    </div>
@endsection
