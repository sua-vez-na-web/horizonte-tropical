@extends('layouts.admin')

@section('content_header')
<h1>
    Pessoas

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('pessoas.index')}}">Pessoas</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Registro</h3>
    </div>
    @if(isset($pessoa))
    {!! Form::model($pessoa,['route'=>['pessoas.update',$pessoa->id],'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @method('PUT')
    @else
    {!! Form::open(['route'=>'pessoas.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @endif
    <div class="box-body">
        @include('admin.pessoas.form')
    </div>
    <div class="box-footer">
        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Pessoas Vinculadas</h3>
    </div>
    <div class="box-body">
        <div class="col-md-6 col-sm-12">
            <ul class="list-group">
                @if(isset($pessoa))
                @forelse($pessoa->dependentes as $dependente)
                <li class="list-group-item">
                    {{$dependente->nome}}
                    <a href="{{ route('pessoas.desvincular',$dependente->id) }}" class="btn btn-xs btn-danger pull-right">Remover vinculo</a>
                </li>
                @empty
                <li class="list-group-item active">Nao Existem Vinculos</li>
                @endforelse
                @endif
            </ul>
        </div>
    </div>
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