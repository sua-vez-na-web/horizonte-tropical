@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table data-table table-hover table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Bloco</th>
                                <th>Apto</th>
                                <th>Poprietário</th>
                                <th>Inquilino</th>
                                <th>Status</th>
                                <th>Garagens</th>
                                <th>Atualizado em</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{str_pad($d->bloco->codigo,'3','000',STR_PAD_LEFT)}}</td>
                                <td>{{$d->apto}}</td>
                                <td>{{$d->proprietario->nome ?? 'Nao Informado'}}</td>
                                <td>{{$d->inquilino->nome ?? 'Nao Informado'}}</td>
                                <td><label for="" class="label label-{{ $d->getApartamentStatus($d->status)['class'] }}">{{ $d->getApartamentStatus($d->status)['status'] }}</label></td>
                                <td>{{$d->garagens()->count() ?? '0'}}</td>
                                <td>{{date('d/m/Y H:i:s',strtotime($d->updated_at))}}</td>
                                <td>
                                    <a href="{{ route('apartamentos.edit', $d->id)}}" class="btn btn-primary btn-xs mx-1">
                                        <i class="fa fa-pencil"></i>
                                        Alterar
                                    </a>
                                    <a href="{{ route('apartamentos.show', $d->id)}}" class="btn btn-success btn-xs mx-1">
                                        <i class="fa fa-eye"></i>
                                        Detalhes
                                    </a>
                                    <a href="{{route('garagens.index',['apto_id'=>$d->id]) }}" class="btn btn-info btn-xs mx-1">
                                        <i class="fa fa-car"></i>
                                        Garagens
                                    </a>
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
<script>
    $('#table').DataTable();
</script>
@stop
