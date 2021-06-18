@extends('layouts.login')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header text-center bg-primary">
                        <img src="{{ asset('img/logo-sistema-cotacao-navbar.png') }}" alt="logo" class="float-left"
                            width="150">
                    </div>
                    <div class="card-body p-2">
                        @yield('content-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
