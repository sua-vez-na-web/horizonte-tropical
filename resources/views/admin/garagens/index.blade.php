@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('content_header')
<h1>
   Garagens
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Pessoas</a></li>
    <li class="active">Lista</li>
</ol>

@stop

@section('content')

<div class="box">
    <div class="box-header">
        <a href="{{route('garagens.create',['apto_id'=>Request::get('apto_id')]) }}" class="btn btn-primary">
            <span><i class="fa fa-plus"></i></span>
            Adicionar Registro</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Veiculo</th>
                    <th>Placa</th>
                    <th>Origem</th>
                    <th>Cedente (BLOCO | APTO )</th>
                    <th>Autorização</th>
                    <th>Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->veiculo }}</td>
                    <td>{{ $d->placa }}</td>
                    <td>{{ $d->origem }}</td>
                    @if($d->origem == \App\Garagem::ORIGEM_TERCEIROS)
                        <td>APTO {{ $d->cedente->apto ?? '' }} | BLOCO {{ $d->cedente->bloco_id ?? '' }}</td>
                        <td><a href="{{ Storage::url($d->file)}}"> Download Autorização </a></td>
                        @else
                        <td>GARAGEM PROPRIA</td>
                        <td> - </td>
                    @endif

                    <td>
                        <a href="{{ route('garagens.edit',$d->id) }}" class="btn btn-primary btn-xs mx-1">Administrar</a>
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
