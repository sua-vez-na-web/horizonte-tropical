@extends('layouts.admin')

@section('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop


@section('content_header')
<h1>
    Registro de Penalidades

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('penalidades.index')}}">Cadastro de Penalidades</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('penalidades.create')}}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Adicionar Penalidade</a>
    </div>
    <div class="box-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Descricao</th>
                    <th>Multa</td>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->id }}</td>
                    <td>{{$d->descricao}}</td>
                    <td>{{$d->multa}}</td>
                    <td>
                        <a href="{{ route('penalidades.edit',$d->id)}}" class="btn btn-default btn-xs">Ver</a>
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
