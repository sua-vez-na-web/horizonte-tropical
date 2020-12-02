@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{route('visitas.create')}}" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    Visita Comun</a>
                <a href="{{route('visitas.create',['type'=>'support'])}}" class="btn btn-success">
                    <span><i class="fa fa-plus"></i></span>
                    Visita Administrativa</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Appoitment">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Codigo</th>
                            <th>Apto</th>
                            <th>Prop/Técnico</th>
                            <th>Visitante</th>
                            <th>Documento</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Duração</th>
                            <th>Administrar</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>

@stop

@section('scripts')
@parent

<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('visitas.index') }}",
            columns: [{
                    data: 'placeholder',
                    name: 'placeholder'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'apto-bloco',
                    name: 'apto-bloco'
                },
                {
                    data: 'proprietario-tecnico',
                    name: 'proprietario-tecnico'
                },

                {
                    data: 'nome_visitante',
                    name: 'nome_visitante'
                },
                {
                    data: 'rg_visitante',
                    name: 'rg_visitante'
                },
                {
                    data: 'dh_entrada',
                    name: 'dh_entrada'
                },
                {
                    data: 'dh_saida',
                    name: 'dh_saida'
                },
                {
                    data: 'duration',
                    name: 'duration',
                    searchable: false
                },
                {
                    data: 'actions',
                    name: "{{ trans('global.actions ') }}"
                }
            ],
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 10,
        };
        let table = $('.datatable-Appoitment').DataTable(dtOverrideGlobals);
        // $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust();
        // });

    });
</script>
@stop
