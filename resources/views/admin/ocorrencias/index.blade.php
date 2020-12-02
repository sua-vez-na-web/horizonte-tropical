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
                    <th>Reclamante</th>
                    <th>Infração</th>
                    <th>Penalidade</th>
                    <th>Status</th>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr class="{{$d->getStatus($d->tipo)['class'] ?? '' }}">
                    <td>{{$d->id}}</td>
                    <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} | APTO: {{$d->apartamento->apto ?? ''}}</td>
                    <td>{{$d->reclamante->nome ?? $d->author->name }}</td>
                    <td>{{$d->infracao->descricao }}</td>
                    <td> <label for="" class="label label-primary }}">{{ $d->penalidade->descricao ?? 'Nenhuma' }}</label></td>
                    <td> <label for="" class="label label-success }}">{{ $d->getStatus($d->status)['status'] ?? '' }}</label></td>
                    <td>
                        @cannot('funcionario')
                        <a href="{{ route('ocorrencias.edit', $d->id)}}" class="btn btn-primary btn-xs mx-1">Administrar</a>
                        @endcannot
                        <a href="{{route('get.upload',$d->id)}}" class="btn btn-success btn-xs mx-1">
                            <i class="fa fa-photo"></i>
                        </a>
                        @if($d->status != \App\Ocorrencia::STATUS_CONCLUIDA)
                        <a href="{{ route('ocorrencias.show', $d->id)}}" class="btn btn-danger btn-xs mx-1">
                            <fa class="fa fa-trash"></fa>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
<!-- Page level plugins -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#table').DataTable({
        ordering: false
    });
</script>
@stop
