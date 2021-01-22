@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <a href="{{route('correspondencias.create')}}" class="btn btn-primary">
                        <span><i class="fa fa-plus"></i></span>
                        Adicionar Registro</a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Appoitment" id="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>CodigoUnico</th>
                                <th>Data Recebimento</th>
                                <th>Tipo</th>
                                <th>Bloco</th>
                                <th>Apto</th>
                                <th>Recebedor</th>
                                <th>Status</th>
                                <th>Data Entrega</th>
                                <th>Administrar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<!-- Page level plugins -->
<!-- <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> -->
<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('correspondencias.index') }}",
            columns: [{
                    data: 'placeholder',
                    name: 'placeholder'
                },
                {
                    data: 'uuid',
                    name: 'uuid'
                },
                {
                    data: 'data_recebimento',
                    name: 'data_recebimento'
                },
                {
                    data: 'tipo',
                    name: 'tipo'
                },

                {
                    data: 'bloco_name',
                    name: 'bloco.bloco',
                    searchable: false
                },
                {
                    data: 'apto_name',
                    name: 'apto.apto',
                    searchable: false
                },
                {
                    data: 'recebedor_name',
                    name: 'recebedor.nome'

                },
                {
                    data: 'status_name',
                    name: 'status',
                },
                {
                    data: 'data_entrega',
                    name: 'data_entrega',
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
