<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/images/avatar.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name ?? 'Developer'}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">--}}
        {{-- <div class="input-group">--}}
        {{-- <input type="text" name="q" class="form-control" placeholder="Search...">--}}
        {{-- <span class="input-group-btn">--}}
        {{-- <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
        {{-- </button>--}}
        {{-- </span>--}}
        {{-- </div>--}}
        {{-- </form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DASHBOARD</li>
            <li><a href="{{route('painel.index')}}"><i class="fa fa-dashboard text-red"></i> <span>Painel</span></a></li>
            <li><a href="{{route('pessoas.index')}}"><i class="fa fa-group text-blue"></i> <span>Pessoas</span></a></li>
            <li><a href="{{route('apartamentos.index')}}"><i class="fa fa-building text-red"></i> <span>Apartamentos</span></a></li>
            <li><a href="{{route('correspondencias.index')}}"><i class="fa fa-envelope text-blue"></i> <span>Correspondências</span></a></li>
            <li><a href="{{route('visitas.index')}}"><i class="fa fa-exchange text-blue"></i> <span>Visitas</span></a></li>
            <li><a href="{{route('pontos.index')}}"><i class="fa fa-clock-o text-red"></i> <span>Ponto</span></a></li>
            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-book text-red"></i>
                    <span>Ocorrencias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ route('ocorrencias.index') }}"><i class="fa fa-circle-o"></i>Ocorrências</a></li>
                    <li><a href="{{ route('infracoes.index') }}"><i class="fa fa-circle-o"></i>Infrações</a></li>
                    <li><a href="{{ route('artigos.index') }}"><i class="fa fa-circle-o"></i>Artigos</a></li>
                    <li><a href="{{ route('penalidades.index') }}"><i class="fa fa-circle-o"></i>Penalidades</a></li>
                </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Relatórios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
                    <li class="treeview" style="height: auto;">
                        <a href="#"><i class="fa fa-circle-o"></i> Ocorrências
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="{{ route('rpt.ocorrencia.individual') }}"><i class="fa fa-circle-o"></i> Individual</a></li>
                            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Por Apartamento (em desenvolv)</a></li> -->
                            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>                             -->
                        </ul>
                    </li>
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Visitas</a></li> -->
                </ul>
            </li>
            @cannot('funcionario')
            <li><a href="{{route('usuarios.index')}}"><i class="fa fa-users text-blue"></i> <span>Usuários</span></a></li>
            @endcannot
            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i> <span>Sair</span></a></li>
        </ul>
    </section>
    <form action="{{route('logout')}}" sytle="display:none" id="logout-form" method="POST">
        @csrf
    </form>
    <!-- /.sidebar -->
</aside>
