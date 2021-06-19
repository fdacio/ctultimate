@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default">
                <div class="card-header bg-primary">
                    <img src="{{ asset('img/logo-sistema-cotacao-navbar.png') }}" alt="logo" width="150">
                </div>
                <div class="card-body text-center">
                    Bem vindo <b>{{ Auth::user()->name }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection
