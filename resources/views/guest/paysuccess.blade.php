@extends('layouts.spa')
@section('page_js')
    <script src="{{ asset('js/transaction.js') }}" defer></script>
@endsection
@section('page_css')
    <link href="{{ asset('css/successp.css') }}" rel="stylesheet">
@endsection

@section('app')
    
<div id="bike">
    <div class="bike">
        <div class="bike__cloud-1"></div>
        <div class="bike__cloud-2"></div>
        <div class="bike__cloud-3"></div>
        <div class="bike__bike">
          <div class="bike__wheel">
            <div class="bike__needle"></div>
            <div class="bike__needle"></div>
            <div class="bike__needle"></div>
          </div>
          <div class="bike__wheel">
            <div class="bike__needle"></div>
            <div class="bike__needle"></div>
            <div class="bike__needle"></div>    
          </div>
          <div class="bike__down-tube"></div>
          <div class="bike__tubes">
            <div class="bike__chain"></div>
            <div class="bike__seat-stays"></div>
            <div class="bike__chain-stays"></div>
            <div class="bike__seat-tube"></div>
            <div class="bike__star">
              <div class="bike__pedal"></div>    
            </div>
            <div class="bike__seat"></div>    
          </div>
          <div class="bike__top-tube"></div>
          <div class="bike__fo"></div>
          <div class="bike__head-tube"></div>
          <div class="bike__helm"></div>
          <div class="bike__lock"></div>    
        </div>
        <div class="bike__man">
          <div class="bike__arm">
            <div class="bike__forearm">
              <div class="bike__hand"></div>    
            </div>
            <div class="bike__sleeve"></div>    
          </div>
          <div class="bike__back-leg">
            <div class="bike__shin">
              <div class="bike__skin"></div>
              <div class="bike__ked"></div>    
            </div>    
          </div>
          <div class="bike__butt"></div>
          <div class="bike__front-leg">
            <div class="bike__shin">
              <div class="bike__skin"></div>
              <div class="bike__ked"></div>    
            </div>    
          </div>
          <div class="bike__shirt">
            <div class="bike__collar"></div>    
          </div>
          <div class="bike__arm">
            <div class="bike__forearm">
              <div class="bike__hand"></div>    
            </div>
            <div class="bike__sleeve"></div>    
          </div>
          <div class="bike__head">
            <div class="bike__eye"></div>
            <div class="bike__eye"></div>
            <div class="bike__whisker"></div>
            <div class="bike__nose"></div>
            <div class="bike__month"></div>
            <div class="bike__whisker"></div>
            <div class="bike__cap">
              <div class="bike__peak">
                <div class="bike__peak-parts"></div>   
              </div>    
            </div>
          </div>
        </div>    
    </div>
    <div id="contenuto">
        <div class="container">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <h1 class="title_success text-center brand-color">
                        PAGAMENTO AVVENUTO CON SUCCESSO
                    </h1>
                    <p class="text-center parag">
                        Il tuo ordine è stato confermato. <br>
                        Riceverai a breve una conferma dell'ordine
                        tramite email.
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/') }}">
                            <button type="button " id="back_home" class="btn btn_back btn-lg p-3">Torna alla pagina principale</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
