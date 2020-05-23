@extends('layouts.admin')

@section('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop


@section('content_header')
<h1>
    Registro de Visitas

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('ocorrencias.index')}}">Registro de Visitas</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('visitas.create')}}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Visita Comun</a>
        <a href="{{route('visitas.create',['type'=>'support'])}}" class="btn btn-success">
            <span><i class="fa fa-plus"></i></span>
            Visita Administrativa</a>
    </div>
    <div class="box-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>BLOCO - APTO</th>
                    <th>PROPRIETARIO/TECNICO</th>
                    <th>Visitante</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Duração</th>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    @if($d->tecnica)
                        <td><p class="label label-primary">Visita Técnica</p></td>
                        <td>{{$d->empresa ?? 'VISITA ADMINISTRATIVA' }}</td>
                    @else
                        <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} |  APTO: {{$d->apartamento->apto ?? ''}}</td>
                        <td>{{$d->apartamento->inquilino->nome ?? 'NAO INFORMADO'}}</td>
                    @endif
                    <td>{{$d->nome_visitante ?? 'nome visitante' }} | {{$d->rg_visitante ?? '' }}</td>
                    <td>{{ date('d/m/Y H:i:s',strtotime($d->dh_entrada))}}</td>
                    <td>{{ $d->dh_saida ? date('d/m/Y H:i:s', strtotime($d->dh_saida)) : 'Em Andamento...' }}</td>
                    <td>{{$d->duracao()}}</td>
                    <td>
                        @if(!$d->dh_saida)
                            <a href="{{ route('visitas.edit', $d->id)}}" class="btn btn-success btn-xs mx-1">Confirmar Saída</a>
                            <a href="{{ route('visitas.show', $d->id)}}" class="btn btn-danger btn-xs mx-1">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            <p class="label label-danger">Visita Encerrada</p>
                        @endif
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
    $('#table').DataTable({
        ordering:false
    });
</script>
@stop
