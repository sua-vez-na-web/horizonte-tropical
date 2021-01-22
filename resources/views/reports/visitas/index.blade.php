@extends('layouts.admin')



@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Relatório Individual de Visitas
                </div>
                <div class="panel-body">

                    <form action="{{ route('rpt.visitas.seach') }}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="">Bloco</label>
                                {!! Form::select('bloco_id',$blocos,null,['class'=>'form-control','placeholder'=>'selecione']) !!}
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">Apto</label>
                                {!! Form::select('apto_id',$apartamentos,null,['class'=>'form-control','placeholder'=>'selecione']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Inicio</label>
                                <input type="date" name="dt_inicio" id="" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Final</label>
                                <input type="date" name="dt_final" id="" class="form-control">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Consultar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($result)
<div class="panel">
    <div class="panel-header">
    </div>
    <div class="panel-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>BLOCO - APTO</th>
                    <th>Visitante</th>
                    <th>Data Entrada</th>
                    <th>Data Saída</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} | APTO: {{$d->apartamento->apto ?? ''}}</td>
                    <td>{{$d->nome_visitante}}</td>
                    <td> {{ date('d/m/Y H:m',strtotime($d->dh_entrada)) }}</td>
                    <td> {{ date('d/m/Y H:m',strtotime($d->dh_saida)) }}</td>
                </tr>
                @empty
                <p class="label label-danger">Nenhum Resultado</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endif

@stop
