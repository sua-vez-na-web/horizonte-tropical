@extends('layouts.admin')

@section('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop


@section('content_header')
<h1>
    Apartamentos

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('apartamentos.index')}}">Apartamentos</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')
<div class="box">
    <div class="box-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Bloco</th>
                    <th>Apto</th>
                    <th>Poprietário</th>
                    <th>Inquilino</th>
                    <th>Status</th>
                    <th>Garagens</th>
                    <th>Ultima Atualização</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{str_pad($d->bloco->codigo,'3','000',STR_PAD_LEFT)}}</td>
                    <td>{{$d->apto}}</td>
                    <td>{{$d->proprietario->nome ?? 'Nao Informado'}}</td>
                    <td>{{$d->inquilino->nome ?? 'Nao Informado'}}</td>
                    <td>{{$d->status}}</td>
                    <td>{{$d->garagens()->count() ?? '0'}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($d->updated_at))}}</td>
                    <td>
                        <a href="{{ route('apartamentos.edit', $d->id)}}" class="btn btn-primary btn-xs mx-1">
                            <i class="fa fa-pencil"></i>
                            Alterar
                        </a>
                        <a href="{{ route('apartamentos.show', $d->id)}}" class="btn btn-success btn-xs mx-1">
                            <i class="fa fa-eye"></i>
                            Detalhes
                        </a>
                        <a href="{{route('garagens.index',['apto_id'=>$d->id]) }}" class="btn btn-info btn-xs mx-1">
                            <i class="fa fa-car"></i>
                            Garagens
                        </a>
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
