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
                    <table class="table data-table table-hover table-bordered table-striped" id="table">
                        <thead>
                            <tr>
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
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->uuid ?? '########' }}</td>
                                <td>{{date("d/m/Y H:i:s",strtotime($d->data_recebimento))}}</td>
                                <td>{{$d->getType($d->tipo)}}</td>
                                <td>{{$d->apartamento->bloco->codigo }}</td>
                                <td>{{$d->apartamento->apto}}</td>
                                <td>{{$d->recebedor->nome}}</td>
                                <td>{{$d->getStatus($d->status) }}</td>
                                <td>{{$d->data_entrega ? date("d/m/Y H:i:s",strtotime($d->data_entrega)) : "Pendende de Entrega"}}</td>
                                <td>
                                    @if(!$d->data_entrega)
                                    <a href="{{ route('correspondencias.edit', $d->id) }}" class="btn btn-primary btn-xs">Baixar
                                        Recebimento</a>
                                    <a href="{{ route('correspondencias.show',$d->id) }}" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                    <a href="{{ route('correspondencias.edit',$d->id)}}" class="btn btn-default btn-xs">Ver</a>
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

@stop

@section('scripts')
<!-- Page level plugins -->
<!-- <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> -->
<script>
    $('#table').DataTable({
        ordering: false
    });
</script>
@stop
