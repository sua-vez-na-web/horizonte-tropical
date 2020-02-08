@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('content_header')
    <h1>
        Registro de Upload de Arquivo de Ponto

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('ocorrencias.index')}}">Upload de Folha de Ponto</a></li>
        <li class="active">Lista</li>
    </ol>
@stop

@section('content')

    <div class="box box-primary">
    <div class="box-header with-border">

        @cannot('funcionario')
            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                Upload de Arquivo de Ponto
            </button>
        @endcannot
    </div>

    <div class="box-body">
        <table class="table table-bordered table-hover" id="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Data</th>
                <th>Arquivo</th>
                @cannot('funcionario')
                    s<th>Administrar</th>
                @endcannot
            </tr>
            </thead>
            <tbody>
            @foreach($pontos as $d)
                <tr>
                    <td>{{ str_pad($d->id,5,'00000',STR_PAD_LEFT) }}</td>
                    <td>{{ date('d/m/Y',strtotime($d->data)) }}</td>
                    <td><a href="{{ Storage::url($d->url) }}" target="_blank"> Download Arquivo</a></td>
                    @cannot('funcionario')
                    <td>
                            <a href="{{ route('pontos.show',$d->id) }}" class="btn btn-danger btn-xs mx-1">
                                <i class="fa fa-trash"></i>
                            </a>
                    </td>
                    @endcannot
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

    <!-- Modal -->
    @cannot('funcionario')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Procure o arquivo no computador</h4>
                </div>
                {!! Form::open(['route'=>'pontos.store','class'=>'form','enctype'=>'multipart/form-data']) !!}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="data_arquivo">Data Competência</label>
                        {!! Form::date('data',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="arquivo">Arquivo</label>
                        {!! Form::file('arquivo',null,['class'=>'form-control']) !!}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endcannot
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $('#table').DataTable();
    </script>
@stop
