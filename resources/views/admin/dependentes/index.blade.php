@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('content_header')
<h1>
    Dependentes de: <strong>{{$pessoa->nome}}</strong>

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Dependentes</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')

<div class="box">
    <div class="box-header">
        <a href="{{route('dependentes.create',['pessoa_id'=>$pessoa->id] )}}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Adicionar Registro</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Tipo Cadastro</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{ str_pad($d->id,5,'00000',STR_PAD_LEFT) }}</td>
                    <td>{{ $d->nome }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->rg }}</td>
                    <td>{{ $d->cpf }}</td>
                    <td>{{ $d->tipo_cadastro }}</td>
                    <td>
                        <a href="{{ route('dependentes.edit',$d->id) }}" class="btn btn-primary btn-sm mx-1">Editar</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#table').DataTable({
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    });
</script>
@stop