@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center bg-primary">
                        <h4 class="text-white">Recuperar Senha</h4>
                    </div>
                    <div class="row">
                        <div class="card-body col-md-4 text-center pr-0 img-login">
                            <img src="{{ asset('img/logo-sistema-cotacao.png') }}" alt="logo" class="img"
                                width="150">
                        </div>
                        <div class="card-body col-md-8">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="control-label">E-Mail</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Enviar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <small class="text-warning font-weight-bold">Informe seu email registrado no sisetma, para receber um link de recuperação de senha.</small>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="link" href="{{ route('login') }}">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
