<table class="table data-table table-hover table-bordered table-striped" id="table_correspondencias">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Data Recebimento</th>
        <th>Tipo</th>
        <th>Apto</th>
        <th>Poprietário</th>
        <th>Status</th>
        <th>Data Entrega</th>
        <th>Administrar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($correspondencias as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{date("d/m/Y",strtotime($d->data_recebimento))}}</td>
            <td>{{$d->tipo}}</td>
            <td>{{$d->apartamento->codigo}}</td>
            <td>{{$d->apartamento->proprietario->nome ?? 'NAO INFORMADO!' }}</td>
            <td>{{$d->status }}</td>
            <td>{{$d->data_entrega ? date("d/m/Y",strtotime($d->data_entrega)) : "Pendende de Entrega"}}</td>
            <td>
                @if(!$d->data_entrega)
                    <a href="{{ route('correspondencias.edit', $d->id) }}" class="btn btn-primary btn-xs mx-1">Baixar Recebimento</a>
                    <a href="{{ route('correspondencias.show',$d->id) }}" class="btn btn-danger btn-xs mx-1">
                        <i class="fa fa-trash"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
