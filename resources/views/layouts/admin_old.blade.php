<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Administração de Condominios</title>
    <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset( 'admin/bower_components/Ionicons/css/ionicons.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" /> -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />

@yield('css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b></b>HT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Horizonte</b>Tropical</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="{{asset('docs/REGIMENTO-INTERNO-NOVO.pdf')}}" target="_blank">
                                Download do Regimento Interno <i class="fa fa-download"></i>
                            </a>
                        </li>
                        <!-- Messages: style can be found in dropdown.less-->
                        {{-- <li class="dropdown messages-menu">--}}
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{-- <i class="fa fa-envelope-o"></i>--}}
                        {{-- <span class="label label-success">4</span>--}}
                        {{-- </a>--}}
                        {{-- <ul class="dropdown-menu">--}}
                        {{-- <li class="header">You have 4 messages</li>--}}
                        {{-- <li>--}}
                        {{-- <!-- inner menu: contains the actual data -->--}}
                        {{-- <ul class="menu">--}}
                        {{-- <li>--}}
                        {{-- <!-- start message -->--}}
                        {{-- <a href="#">--}}
                        {{-- <div class="pull-left">--}}
                        {{-- <img src="admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                        {{-- </div>--}}
                        {{-- <h4>--}}
                        {{-- Support Team--}}
                        {{-- <small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                        {{-- </h4>--}}
                        {{-- <p>Why not buy a new awesome theme?</p>--}}
                        {{-- </a>--}}
                        {{-- </li>--}}
                        {{-- <!-- end message -->--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <li class="footer"><a href="#">See All Messages</a></li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <!-- Notifications: style can be found in dropdown.less -->--}}
                        {{-- <li class="dropdown notifications-menu">--}}
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{-- <i class="fa fa-bell-o"></i>--}}
                        {{-- <span class="label label-warning">10</span>--}}
                        {{-- </a>--}}
                        {{-- <ul class="dropdown-menu">--}}
                        {{-- <li class="header">You have 10 notifications</li>--}}
                        {{-- <li>--}}
                        {{-- <!-- inner menu: contains the actual data -->--}}
                        {{-- <ul class="menu">--}}
                        {{-- <li>--}}
                        {{-- <a href="#">--}}
                        {{-- <i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                        {{-- </a>--}}
                        {{-- </li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <li class="footer"><a href="#">View all</a></li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <!-- Tasks: style can be found in dropdown.less -->--}}
                        {{-- <li class="dropdown tasks-menu">--}}
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{-- <i class="fa fa-flag-o"></i>--}}
                        {{-- <span class="label label-danger">9</span>--}}
                        {{-- </a>--}}
                        {{-- <ul class="dropdown-menu">--}}
                        {{-- <li class="header">You have 9 tasks</li>--}}
                        {{-- <li>--}}
                        {{-- <!-- inner menu: contains the actual data -->--}}
                        {{-- <ul class="menu">--}}
                        {{-- <li>--}}
                        {{-- <!-- Task item -->--}}
                        {{-- <a href="#">--}}
                        {{-- <h3>--}}
                        {{-- Design some buttons--}}
                        {{-- <small class="pull-right">20%</small>--}}
                        {{-- </h3>--}}
                        {{-- <div class="progress xs">--}}
                        {{-- <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                        {{-- <span class="sr-only">20% Complete</span>--}}
                        {{-- </div>--}}
                        {{-- </div>--}}
                        {{-- </a>--}}
                        {{-- </li>--}}
                        {{-- <!-- end task item -->--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <li class="footer">--}}
                        {{-- <a href="#">View all tasks</a>--}}
                        {{-- </li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <!-- User Account: style can be found in dropdown.less -->--}}
                        {{-- <li class="dropdown user user-menu">--}}
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{-- <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">--}}
                        {{-- <span class="hidden-xs">Developer</span>--}}
                        {{-- </a>--}}
                        {{-- <ul class="dropdown-menu">--}}
                        {{-- <!-- User image -->--}}
                        {{-- <li class="user-header">--}}
                        {{-- <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}

                        {{-- <p>--}}
                        {{-- {{Auth::user()->name ?? 'Developer'}}--}}
                        {{-- <small>Member since Nov. 2012</small>--}}
                        {{-- </p>--}}
                        {{-- </li>--}}
                        {{-- <!-- Menu Body -->--}}
                        {{-- <li class="user-body">--}}
                        {{-- <div class="row">--}}
                        {{-- <div class="col-xs-4 text-center">--}}
                        {{-- <a href="#">Followers</a>--}}
                        {{-- </div>--}}
                        {{-- <div class="col-xs-4 text-center">--}}
                        {{-- <a href="#">Sales</a>--}}
                        {{-- </div>--}}
                        {{-- <div class="col-xs-4 text-center">--}}
                        {{-- <a href="#">Friends</a>--}}
                        {{-- </div>--}}
                        {{-- </div>--}}
                        {{-- <!-- /.row -->--}}
                        {{-- </li>--}}
                        {{-- <!-- Menu Footer-->--}}
                        {{-- <li class="user-footer">--}}
                        {{-- <div class="pull-left">--}}
                        {{-- <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                        {{-- </div>--}}
                        {{-- <div class="pull-right">--}}
                        {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
                        {{-- </div>--}}
                        {{-- </li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}
                        {{-- <!-- Control Sidebar Toggle Button -->--}}
                        {{-- <li>--}}
                        {{-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                        {{-- </li>--}}
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
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

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">
                @yield('content_header')

            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        @include('tools.messages')
                    </div>
                </div>
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0.0
            </div>
            <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">Horizonte Tropical</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!-- <script src="{{ asset('js/main.js') }}"></script> -->
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script>
    @yield('js')
</body>

</html> -->
