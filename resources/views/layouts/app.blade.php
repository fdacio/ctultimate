<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cotação') }}</title>

    <!-- Styles -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark navbar-expand-sm bg-primary p-0">
            <a class="navbar-brand col-md-2" href="#">
                <img src="{{ asset('img/logo-sistema-navbar.png') }}" alt="logo" width="90">
            </a>
            <button class="navbar-toggler hidden-lg-up float-xs-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                @auth
                    <ul class="nav navbar-nav px-3 ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle mr-2  text-white" style="font-size: 24px"></i>
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('perfil')}}">Perfil</a>
                                <a class="dropdown-item" href="{{ route('edit.password') }}">Alterar Senha</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                            </div>

                        </li>
                    </ul>
                @endauth
            </div>
        </nav>

        <div class="collapse navbar-collapse menu-responsive" id="navbarSupportedContent">
            <nav class="nav navbar-nav text-white bg-primary">
                @include('layouts.menus.menu-main')
            </nav>
        </div>
        </div>

    </header>
    <div class="container-fluid body-content">
        <div class="row">
            <nav class="sidebar col-md-2 bg-light hide">
                <div class="sidebar-sticky">
                    @include('layouts.menus.menu-main')
                </div>
            </nav>
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10">
                @yield('content')
            </main>
        </div>
    </div>
    <footer>
        Dacio Software. Todos os Direitos Reservados
    </footer>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/pt-BR.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
