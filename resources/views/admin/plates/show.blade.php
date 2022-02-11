@extends('layouts.admin')

@section('content')
    
<div class="card-group">
    <div class="card">
        <img class="card-img-top" src="{{asset( "/storage/" . $plate->image)}}" alt="">
        <div class="card-body">
            <h4 class="card-title">{{$plate->name}}</h4>
            <p class="card-text">{{$plate->description}}</p>
            <p class="card-text">{{$plate->ingredients}}</p>
            <p class="card-text">{{$plate->price}} &euro;</p>
            <p class="card-text">{{$plate->available}}</p>
            @auth
            <div class="actions">
                <a href="{{route('admin.plates.index')}}">Back to Admin</a>
                <a href="{{route('admin.plates.edit', $plate->id)}}">Modify</a>
            </div>
            @endauth
        </div>
    </div>


@endsection