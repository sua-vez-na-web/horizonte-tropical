<table class="table data-table table-hover table-bordered table-striped" id="table_visitas">
    <thead>
    <tr>
        <th>#ID</th>
        <th>BLOCO - APTO</th>
        <th>Poprietário</th>
        <th>Visitante</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Duração</th>
        <!-- <th>Administrar</th> -->
    </tr>
    </thead>
    <tbody>
    @foreach($visitas as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>BLOCO: {{$d->apartamento->bloco->codigo}} |  APTO: {{$d->apartamento->codigo}}</td>
            <td>{{$d->apartamento->proprietario->nome ?? 'NAO LOCALIZADO!' }}</td>
            <td>{{$d->visitante ?? 'nome visitante' }} | RG: {{$d->r}}</td>
            <td>{{ date('d/m/Y H:i:s',strtotime($d->dh_entrada))}}</td>
            <td>{{ $d->dh_saida ? date('d/m/Y H:i:s', strtotime($d->dh_saida)) : 'Em Andamento...' }}</td>
            <td>{{$d->duracao()}}</td>
            <!-- <td>
                @if(!$d->dh_saida)
                    <a href="{{ route('visitas.edit', $d->id)}}" class="btn btn-success btn-xs mx-1">Confirmar Saída</a>
                    <a href="{{ route('visitas.show', $d->id)}}" class="btn btn-danger btn-xs mx-1">
                        <i class="fa fa-trash"></i>
                    </a>
                @endif
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>
