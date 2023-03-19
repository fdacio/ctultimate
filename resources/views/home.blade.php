@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissable ''">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span
                            aria-hidden="true">&times;</span></button>
                    <ul>

                        <li>{{ session('error') }}</li>

                    </ul>
                </div>
            @endif
            <div class="card card-default">
                <div class="card-body text-center">
                    <img class="image-responsive" src="img/logo-sistema.png">
                </div>
            </div>
        </div>
    </div>
@endsection
