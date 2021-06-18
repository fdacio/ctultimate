<ul class="navbar-nav flex-column bg-default mt-2 p-2">
    <li class="nav-item"> <a href="#" data-toggle="collapse" data-target="#configuracoes" class="collapsed nav-link"> <i
                class="fa fa-laptop"></i> <span class="nav-label">Configurações</span> <span
                class="fa fa-chevron-left pull-right"></span> </a>
        <ul class="navbar-nav sub-menu collapse p-1" id="configuracoes">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Editar</a></li>
        </ul>
    </li>

    <li class="nav-item"> <a href="#" data-toggle="collapse" data-target="#cadastros-gerais" class="collapsed nav-link"> <i
                class="fa fa-edit"></i> <span class="nav-label">Cadastros Gerais</span> <span
                class="fa fa-chevron-left pull-right"></span> </a>
        <ul class="navbar-nav sub-menu collapse  p-1" id="cadastros-gerais">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Cadastro 1</a></li>
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Cadastro 2</a></li>
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Cadastro 3</a></li>
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Cadastro 4</a></li>
        </ul>
    </li>
    <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-laptop"></i> <span class="nav-label">Empresas</span></a></li>
    <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-laptop"></i> <span class="nav-label">Produtos</span></a></li>

    <li class="nav-item"> <a href="#" data-toggle="collapse" data-target="#cotacoes" class="collapsed nav-link"><i class="fa fa-table"></i>
            <span class="nav-label">Cotações</span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul class="navbar-nav sub-menu collapse p-1" id="cotacoes">
            <li><a href="{{ route('home') }}" class="nav-link"><span class="fa fa-link mr-1"></span>Movimento 1</a></li>
            <li><a href="{{ route('home') }}" class="nav-link"><span class="fa fa-link mr-1"></span>Movimento 2</a></li>
            <li><a href="{{ route('home') }}" class="nav-link"><span class="fa fa-link mr-1"></span>Movimento 2</a></li>
        </ul>
    </li>
    <li class="nav-item"> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed nav-link"><i
                class="fa fa-laptop"></i> <span class="nav-label">Relatórios</span><span
                class="fa fa-chevron-left pull-right"></span></a>
        <ul class="navbar-nav sub-menu collapse p-1" id="e-commerce">
            <li><a href="{{ route('home') }}" class="nav-link">Relatório 1</a></li>
            <li><a href="{{ route('home') }}" class="nav-link">Relatório 1</a></li>
            <li><a href="{{ route('home') }}" class="nav-link">Relatório 1</a></li>
        </ul>
    </li>
    <li class="nav-item"> <a href="#" class="nav-link"><i class="fa fa-users"></i> <span class="nav-label">Usuários</span></a> </li>
</ul>
