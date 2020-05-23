<table class="table data-table table-hover table-bordered table-striped" id="table_ocorrencias">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Infração</th>
        <th>Penalidade</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ocorrencias as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>ART: {{$d->infracao->codigo}} |{{$d->infracao->descricao }}</td>
            <td> <label for="" class="label label-{{$d->getPenalidade($d->penalidade)['class'] }}">{{ $d->getPenalidade($d->penalidade)['status'] ?? '' }}</label></td>
            <td> <label for="" class="label label-{{$d->getStatus($d->status)['class'] }}">{{ $d->getStatus($d->status)['status'] ?? '' }}</label></td>
        </tr>
    @endforeach
    </tbody>
</table>
