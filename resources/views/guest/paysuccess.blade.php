@extends('layouts.spa')
@section('page_js')
    <script src="{{ asset('js/transaction.js') }}" defer></script>
@endsection
@section('page_css')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endsection

@section('app')
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-6 fw-bold text-success">Pagamento avvenuta con successo!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Il tuo ordine &eacute; stato confermato. Riceverai a breve una conferma dell'ordine
                tramite email.</p>
            <p></p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="{{ url('/') }}">
                    <button type="button" id="back_home" class="btn btn-outline-secondary btn-lg px-4">Torna alla pagina principale</button>
                </a>
            </div>
        </div>
        <div>
            <div class="container px-5">
                <img src="{{ asset('/img/jumbo/inarrivo.png') }}" class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>
@endsection
