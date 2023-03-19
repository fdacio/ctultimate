<ul class="navbar-nav flex-column bg-default mt-2 p-2">
    <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-peoples"></i> <span
                class="nav-label">Alunos</span></a></li>
    <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-check-list"></i> <span
                class="nav-label">Matrículas</span></a></li>
    <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-dolar></i> <span
                    class="nav-label">Mensalidades</span></a></li>            

    <li class="nav-item"> <a href="#" data-toggle="collapse" data-target="#users" class="collapsed nav-link"><i
                class="fa fa-users"></i> <span class="nav-label">Usuários</span><span
                class="fa fa-chevron-left pull-right"></span></a> </li>
    <ul class="navbar-nav sub-menu collapse p-1" id="users">
        <li><a href="{{ route('tipos-usuarios.index') }}" class="nav-link"><span class="fa fa-link mr-1"></span>Tipos</a></li>
        <li><a href="{{ route('user.index') }}" class="nav-link"><span class="fa fa-link mr-1"></span>Usuários</a></li>
    </ul>
</ul>
