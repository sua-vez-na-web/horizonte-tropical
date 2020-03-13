@extends('layouts.admin')

@section('content_header')
    <h1>
        Detalhes Do Apartamento: {{"Bloco: ".$apartamento->bloco->codigo." | ".$apartamento->apto}}

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('apartamentos.index')}}">Apartamentos</a></li>
        <li class="active">Lista</li>
    </ol>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3><span class="label label-primary">MORADOR: {{ $apartamento->inquilino->nome ?? ''}}</span></h3>
            <h3><span class="label label-primary">PROPRIETÁRIO: {{ $apartamento->proprietario->nome ?? '' }}</span></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Visitas</span>
                    <span class="info-box-number">{{$visitas->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Ocorrencias</span>
                    <span class="info-box-number">{{$ocorrencias->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Correspondências</span>
                    <span class="info-box-number">{{$correspondencias->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Detalhes do Apartamento
            </h3>

        </div>
        <div class="box-body">


                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Correspondências</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Ocorrências</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Visitas</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Moradores/Dependentes</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                @include('admin.apartamentos.tab1_correspondencias')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                @include('admin.apartamentos.tab2_ocorrencias')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                @include('admin.apartamentos.tab3_visitas')
                            </div>
                            <div class="tab-pane" id="tab_4">
                                @include('admin.apartamentos.tab4_moradores')
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->


        </div>
    </div>
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('js')
    <!-- Page level plugins -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $('#table_correspondencias').DataTable();
        $('#table_ocorrencias').DataTable();
        $('#table_visitas').DataTable();
    </script>
@stop
