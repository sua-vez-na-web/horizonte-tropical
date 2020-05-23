<table class="table data-table table-hover table-bordered table-striped" id="table_visitas">
    <thead>
        <tr>
            <th>Visitante</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Duração</th>
        </tr>
    </thead>
    <tbody>
    @foreach($visitas as $d)
        <tr>
            <td>{{ $d->nome_visitante ?? 'nome visitante' }} - {{ $d->rg_visitante}}</td>
            <td>{{ date('d/m/Y H:i:s',strtotime($d->dh_entrada))}}</td>
            <td>{{ $d->dh_saida ? date('d/m/Y H:i:s', strtotime($d->dh_saida)) : 'Em Andamento...' }}</td>
            <td>{{$d->duracao()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
