@extends('layouts.admin')

@section('content_header')
<h1>
    Registro de Correspondência

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('correspondencias.index')}}">Registro de Correspondência</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Adicionar Registro
                </div>
                @if(isset($correspondencia))
                {!! Form::model($correspondencia,['route'=>['correspondencias.update',$correspondencia->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                @method('PUT')
                @else
                {!! Form::open(['route'=>'correspondencias.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
                @endif
                <div class="panel-body">
                    @include('admin.correspondencias.form')
                </div>
                <div class="panel-footer">
                    {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
