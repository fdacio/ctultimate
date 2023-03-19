@extends('layouts.login')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card border border-primary">
                    <div class="card-header bg-white border border-botton-primary text-center">
                        <img src="{{ asset('img/logo-sistema-navbar.png') }}" alt="logo" width="150">
                    </div>
                    <div class="card-body p-2">
                        @yield('content-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $('.form').submit(function() {
        console.log($(this));
        $(this).find('button[type=submit]').prop('disabled', true).html('Aguarde...');
    });
</script>
@endsection