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
        <div class="box-header">
            <a href="{{route('apartamentos.create')}}" class="btn btn-primary">
                <span><i class="fa fa-plus"></i></span>
                 Adicionar Registro</a>
        </div>
        <div class="box-body">
            <table class="table data-table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Bloco</th>
                        <th>Poprietário</th>
                        <th>Status</th>
                        <th>Prop. Residente</th>
                        <th>Action</th>
                    </tr>
                </thead>
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
            processing: true,
            serverSide: true,
            ajax: "{{route('apartamentos.index')}}",
            columns: [
                {data: 'bloco.codigo', name: 'blco.codigo'},
                {data: 'proprietario.nome', name: 'proprietario.nome'},
                {data: 'status', name: 'status'},
                {data: 'prop_residente', name: 'prop_residente'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language:{
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
