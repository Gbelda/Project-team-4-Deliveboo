@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card my-2">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Sei loggato!') }}
            </div>
        </div>
    </div>

@endsection
