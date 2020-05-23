<table class="table data-table table-hover table-bordered table-striped" id="table_correspondencias">
    <thead>
    <tr>
        <th>Codigo Recebimento</th>
        <th>Data Recebimento</th>
        <th>Tipo</th>
        <th>Status</th>
        <th>Data Entrega</th>
    </tr>
    </thead>
    <tbody>
    @foreach($correspondencias as $d)
        <tr>
            <td>{{$d->uuid ?? '########' }}</td>
            <td>{{date("d/m/Y H:s:i",strtotime($d->data_recebimento))}}</td>
            <td>{{$d->getType($d->tipo)}}</td>
            <td>{{$d->getStatus($d->status) }}</td>
            <td>{{$d->data_entrega ? date("d/m/Y h:i:s",strtotime($d->data_entrega)) : "Pendende de Entrega"}}</td>
            <!-- <td>
                @if(!$d->data_entrega)
                    <a href="{{ route('correspondencias.edit', $d->id) }}" class="btn btn-primary btn-xs mx-1">Baixar Recebimento</a>
                    <a href="{{ route('correspondencias.show',$d->id) }}" class="btn btn-danger btn-xs mx-1">
                        <i class="fa fa-trash"></i>
                    </a>
                @endif
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>
