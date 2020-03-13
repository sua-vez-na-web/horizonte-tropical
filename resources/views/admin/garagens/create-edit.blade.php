@extends('layouts.admin')

@section('content_header')
<h1>
    Garagem
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('apartamentos.index')}}">Detalhe Apartamento</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Registro</h3>
    </div>
    @if(isset($garagem))
    {!! Form::model($garagem,['route'=>['garagens.update',$garagem->id],'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @method('PUT')
    @else
    {!! Form::open(['route'=>'garagens.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
        <input type="hidden" name="apto" value="{{ Request::get('apto_id') }}">
    @endif
    <div class="box-body">
        @include('admin.garagens.form')
    </div>
    <div class="box-footer">
        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop


