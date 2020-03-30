@extends('layouts.admin')

@section('content_header')
    <h1>
        Registro de Correspondência

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
                    <label for="bloco_id" class="col-sm-2 control-label">Data da Baixa</label>
                    <div class="col-sm-8">
                    <input type="text" value="{{date("d/m/Y H:i:s",strtotime(now()))}}" name="data_entrega" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloco_id" class="col-sm-2 control-label">Recebedor</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$correspondencia->recebedor->nome}}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="codigo" class="col-sm-2 control-label">Detalhes</label>
                    <div class="col-sm-8">
                        {!! Form::textarea('detalhes',null,['class'=>'form-control','readonly'=>'true']) !!}
                    </div>
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="status" class="col-sm-2 control-label">Status</label>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        {!! Form::select("status",[--}}
{{--                            "ENTREGUE"            => "Entregue",--}}
{{--                            "PENDENTE DE ENTREGA" => "Pendende de entrega"--}}
{{--                        ],null,['class'=>"form-control","placeholder"=>"Selecione..."]) !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            @if($correspondencia->status == 0)
                <div class="box-footer">
                    {!! Form::submit('Baixar Correspondencia',['class'=>'btn btn-primary']) !!}
                </div>
            @endif    
        {!! Form::close() !!}
    </div>
@stop
