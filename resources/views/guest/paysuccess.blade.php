@extends('layouts.spa')

@section('page_css')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endsection

@section('app')
        <div class="container pt-5 mt-5">
    
            @if (session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
                @endif
                <a href="{{ url('/') }}"><button class="btn btn-primary">Torna alla Home</button></a>
        </div>
@endsection
