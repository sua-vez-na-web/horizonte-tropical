@extends('layouts.admin')

@section('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop


@section('content_header')
<h1>
    Registro de Correspondências

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('correspondencias.index')}}">Registro de Correspondências</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('correspondencias.create')}}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Adicionar Registro</a>
    </div>
    <div class="box-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Data Recebimento</th>
                    <th>Tipo</th>
                    <th>Apto</th>
                    <th>Poprietário</th>
                    <th>Status</th>
                    <th>Data Entrega</th>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{date("d/m/Y",strtotime($d->data_recebimento))}}</td>
                    <td>{{$d->tipo}}</td>
                    <td>{{$d->apartamento->codigo}}</td>
                    <td>{{$d->apartamento->proprietario->nome ?? 'NAO INFORMADO!' }}</td>
                    <td>{{$d->status }}</td>
                    <td>{{$d->data_entrega ? date("d/m/Y",strtotime($d->data_entrega)) : "Pendende de Entrega"}}</td>
                    <td>
                        @if(!$d->data_entrega)
                            <a href="{{ route('correspondencias.edit', $d->id) }}" class="btn btn-primary btn-xs mx-1">Baixar Recebimento</a>
                            <a href="{{ route('correspondencias.show',$d->id) }}" class="btn btn-danger btn-xs mx-1">
                                <i class="fa fa-trash"></i>
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

@section('js')
<!-- Page level plugins -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#table').DataTable();
</script>
@stop
