@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>

                <div class="image">
                    <img src="{{ asset('storage/'. $user->image) }}" alt="">
                    <h1>add description</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
