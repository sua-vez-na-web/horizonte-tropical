@extends('layouts.admin')

@section('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop


@section('content_header')
<h1>
    Registro de Ocorrências

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('ocorrencias.index')}}">Registro de Correspondências</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('ocorrencias.create')}}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Adicionar Registro</a>
    </div>
    <div class="box-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>BLOCO - APTO</th>
                    <th>Poprietário</th>
                    <th>Infração</th>
                    <th>Tipo</th>
                    <th>Penalidade</th>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>BLOCO: {{$d->apartamento->bloco->codigo}} |  APTO: {{$d->apartamento->codigo}}</td>
                    <td>{{$d->apartamento->proprietario->nome ?? 'NAO LOCALIZADO!' }}</td>
                    <td>ART: {{$d->infracao->codigo}} |{{$d->infracao->descricao }}</td>
                    <td>{{$d->tipo}}</td>
                    <td>{{$d->penalidade}}</td>
                    <td>
                        <a href="{{ route('ocorrencias.edit', $d->id)}}" class="btn btn-primary btn-sm mx-1">Atualizar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<!-- Page level plugins -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#table').DataTable();
</script>
@stop
