@extends('layouts.admin')

@section('content_header')
    <h1>
        Registro de Ocorrência

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('ocorrencias.index')}}">Registro de Correspondências</a></li>

        <li class="active">Adicionar Registro</li>
    </ol>
@stop

@section("content")
    <div class="box box-primary">
        <div class="box-header">
            Atualizar Status
        </div>
        {!! Form::model($ocorrencia,['route'=>['ocorrencias.update',$ocorrencia->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
            @csrf
            @method("PUT")
            <div class="box-body">
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Data da Ocorrência</label>
                    <div class="col-sm-8">
                        <input type="text" value=" {{date('d/m/Y',strtotime($ocorrencia->data))}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Apartamento</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$ocorrencia->apartamento->inquilino->nome ?? "NAO INFORMADO"}}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Reclamante</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$ocorrencia->reclamante->nome ?? "NAO INFORMADO"}}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="codigo" class="col-sm-2 control-label">Detalhes</label>
                    <div class="col-sm-8">
                        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="penalidade" class="col-sm-2 control-label">Penalidade</label>
                    <div class="col-sm-8">
                        {!! Form::select("penalidade",[
                            "MEDIA" => "Média",
                            "LEVE" => "Leve",
                            "GRAVE" => "Grave",
                        ],null,['class'=>"form-control"]) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Tipo de Penalidade</label>
                    <div class="col-sm-8">
                        {!! Form::select("tipo",[
                            "NOTIFICACAO" => "Notificação",
                            "MULTA" => "Multa",
                            "OCORRENCIA" => "Ocorrência",
                        ],null,['class'=>"form-control"]) !!}
                    </div>
                </div> -->
            </div>
        <div class="box-footer">
            {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
