@extends('layouts.admin')
@section('content')

    @include('partials.admin.dashboard')
    <div class="col-md-9 d-flex justify-content-center">
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

            </div>
        </div>
    </div>


@endsection
