<table class="table data-table table-hover table-bordered table-striped" id="table_ocorrencias">
    <thead>
    <tr>
        <th>#ID</th>
        <th>BLOCO - APTO</th>
        <th>Poprietário</th>
        <th>Infração</th>
        <th>Tipo</th>
        <th>Penalidade</th>
        <!-- <th>Administrar</th> -->
    </tr>
    </thead>
    <tbody>
    @foreach($ocorrencias as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>BLOCO: {{$d->apartamento->bloco->codigo}} |  APTO: {{$d->apartamento->codigo}}</td>
            <td>{{$d->apartamento->proprietario->nome ?? 'NAO LOCALIZADO!' }}</td>
            <td>ART: {{$d->infracao->codigo}} |{{$d->infracao->descricao }}</td>
            <td>{{$d->tipo}}</td>
            <td>{{$d->penalidade}}</td>
            <!-- <td>
                <a href="{{ route('ocorrencias.edit', $d->id)}}" class="btn btn-primary btn-xs mx-1">Administrar</a>
                <a href="{{route('get.upload',$d->id)}}" class="btn btn-success btn-xs mx-1">
                    <i class="fa fa-photo"></i>
                </a>
                <a href="{{ route('ocorrencias.show', $d->id)}}" class="btn btn-danger btn-xs mx-1">
                    <fa class="fa fa-trash"></fa>
                </a>
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>
