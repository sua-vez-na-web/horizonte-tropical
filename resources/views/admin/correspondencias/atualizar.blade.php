@extends('layouts.admin')

@section('content_header')
    <h1>
        Registro de Correspondência

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('correspondencias.index')}}">Registro de Correspondências</a></li>
        <li><a href="{{route('correspondencias.index')}}">Registro de Correspondências</a></li>
        <li class="active">Adicionar Registro</li>
    </ol>
@stop

@section("content")
    <div class="box box-primary">
        <div class="box-header">
            Atualizar Status
        </div>
        {!! Form::model($correspondencia,['route'=>['correspondencias.update',$correspondencia->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
            @csrf
            @method("PUT")
            <div class="box-body">
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Data do Recebimento</label>
                    <div class="col-sm-8">
                        <input type="text" value=" {{$correspondencia->data_recebimento}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Apartamento</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$correspondencia->apartamento->inquilino->nome ?? "indefinido"}}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="codigo" class="col-sm-2 control-label">Detalhes</label>
                    <div class="col-sm-8">
                        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                        {!! Form::select("status",[
                            "ENTREGUE"            => "Entregue",
                            "PENDENTE DE ENTREGA" => "Pendende de entrega"
                        ],null,['class'=>"form-control"]) !!}
                    </div>
                </div>
            </div>
        <div class="box-footer">
            {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop