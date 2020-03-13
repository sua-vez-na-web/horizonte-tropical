<table class="table data-table table-hover table-bordered table-striped" id="table_visitas">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>CPF</th>

    </tr>
    </thead>
    <tbody>
    @foreach($moradores as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->nome}}</td>
            <td>{{$d->email ?? '' }}</td>
            <td>{{$d->telefone</td>
        </tr>
    @endforeach
    </tbody>
</table>
