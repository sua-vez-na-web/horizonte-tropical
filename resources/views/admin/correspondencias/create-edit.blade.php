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
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Registro</h3>
    </div>
    @if(isset($correspondencia))
    {!! Form::model($correspondencia,['route'=>['correspondencias.update',$correspondencia->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
    @method('PUT')
    @else
    {!! Form::open(['route'=>'correspondencias.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @endif
    <div class="box-body">
        @include('admin.correspondencias.form')
    </div>
    <div class="box-footer">
        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop


@section('js')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2();
</script>

@stop