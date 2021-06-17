@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    VOCê ESTÁ LOGADO
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
