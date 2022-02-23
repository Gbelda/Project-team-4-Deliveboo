@extends('layouts.admin')
@section('content')

    <div class="container" id="log">
        <div class="card">
            <div class="card-header">{{ __('DASHBOARD') }}</div>

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
