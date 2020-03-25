@extends('layouts.admin')

@section('content_header')
    <h1>
        Visitas

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('visitas.index')}}">Registro de Vistias</a></li>

        <li class="active">Atualizar Registro</li>
    </ol>
@stop

@section("content")
    <div class="box box-primary">
        <div class="box-header">
            Atualizar Status
        </div>
        {!! Form::model($visita,['route'=>['visitas.update',$visita->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
            @csrf
            @method("PUT")
            <div class="box-body">


                @if($visita->tecnica == 1)
                    <div class="form-group">
                        <label for="proprietario_id" class="col-sm-2 control-label">Empresa</label>
                        <div class="col-sm-5">
                            {!! Form::text('empresa',null,['class'=>'form-control','readonly'=>'true']) !!}
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label for="bloco_id" class="col-sm-2 control-label">BLOCO | APTO</label>
                        <div class="col-sm-5">
                            <input type="text" value="BLOCO: {{$visita->apartamento->bloco->codigo}} |  APTO: {{$visita->apartamento->codigo}}" class="form-control" readonly>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Data da Entrada</label>
                    <div class="col-sm-5">
                        <input type="text" value=" {{date('d/m/Y m:i:s',strtotime($visita->dh_entrada))}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Data da Saida</label>
                    <div class="col-sm-5">
                        <input type="text" value=" {{date('d/m/Y m:i:s',strtotime(now()))}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Duração</label>
                    <div class="col-sm-5">
                        <input type="text" value=" {{$visita->duracao()}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Visitante/Resp.</label>
                    <div class="col-sm-5">
                        <input type="text" value="{{$visita->nome_visitante}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">RG</label>
                    <div class="col-sm-5">
                        <input type="text" value="{{$visita->rg_visitante}}" class="form-control" readonly>
                    </div>
                </div>

            </div>
        <div class="box-footer">
            {!! Form::submit('Confirmar Saída',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
