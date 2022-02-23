@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center section_title">PIATTO: {{$plate->name}}</h1>
    <div class="card-group" id="show_plate">
        <div class="d-flex">
            <div class="right_col m-3">
                <div class="card_info H_f">
                    <h4 class="card-title">{{$plate->name}}</h4>
                    <span class="FW">DESCRIZIONE</span>
                    <p class="card-text text_desc">{{$plate->description}}</p>
                    <span class="FW">INGREDIENTI</span>
                    <p class="card-text text_ingredients">{{$plate->ingredients}}</p>
                    <span class="FW">DISPONIBILITÀ</span>
                    <p class="card-text text-ava">{{$plate->available}}</p>
                    <span class="FW">PREZZO</span>
                    <p class="card-text card_price">{{$plate->price}} &euro;</p>
                </div>
            </div>
        </div>
        <br>
        @auth
        <div class="actions d-flex justify-content-between">
            <a class="btn" href="{{route('admin.plates.index')}}">Torna all'admin</a>
            <a class="btn" href="{{route('admin.plates.edit', $plate->id)}}">Modifica</a>
        </div>
        @endauth
    </div>
</div>

@endsection