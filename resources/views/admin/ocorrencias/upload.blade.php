@extends('layouts.admin')

@section('content_header')
    <h1>
        Upload de Foto da Ocorrência
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('ocorrencias.index')}}">Registro de Correspondências</a></li>

        <li class="active">Adicionar Registro</li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            {!! Form::open([ 'route'=>['post.upload',$id],'enctype'=>'multipart/form-data','class'=>'form-inline']) !!}
                <div class="form-group">
                    <label for="">Arquivo</label>
                    {!! Form::file('foto',['class'=>'form-control']) !!}
                </div>
            {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="box-body">
            @foreach($fotos->chunk(3) as $chunk)
            <div class="row margin-bottom">
                @foreach($chunk as $item)
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="img">
                            <img src="{{Storage::url($item->url)}}" alt="{{$item->url}}" class="img-responsive img-thumbnail" style="max-width: 300px">
                            <a href="{{route('delete.upload',$item->id)}}" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
@stop
