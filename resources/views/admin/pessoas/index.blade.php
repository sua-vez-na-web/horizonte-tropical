@extends('layouts.admin')


@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{route('pessoas.create')}}" class="btn btn-primary">
                        <span><i class="fa fa-plus"></i></span>
                        Adicionar Registro</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo de Cadastro</th>
                                <th>Administrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ str_pad($d->id,5,'00000',STR_PAD_LEFT) }}</td>
                                <td>{{ $d->nome }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->getTypePerson($d->tipo_cadastro) }}</td>
                                <td>
                                    <a href="{{ route('pessoas.edit',$d->id) }}" class="btn btn-primary btn-xs mx-1">Administrar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
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
