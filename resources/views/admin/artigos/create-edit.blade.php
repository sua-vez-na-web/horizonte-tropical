@extends('layouts.admin')

@section('content_header')
<h1>
    Registro de Artigos

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('artigos.index')}}">Registro de Artigos</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Registro</h3>
    </div>
    @if(isset($artigo))
    {!! Form::model($artigo,['route'=>['artigos.update',$artigo->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
    @method('PUT')
    @else
    {!! Form::open(['route'=>'artigos.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @endif
    <div class="box-body">
        @include('admin.artigos.form')
    </div>
    <div class="box-footer">
        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop


