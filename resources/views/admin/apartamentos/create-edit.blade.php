@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Registro</h3>
                </div>
                @if(isset($apartamento))
                {!! Form::model($apartamento,['route'=>['apartamentos.update',$apartamento->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                @method('PUT')
                @else
                {!! Form::open(['route'=>'apartamentos.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
                @endif
                <div class="box-body">
                    @include('admin.apartamentos.form')
                </div>
                <div class="box-footer">
                    {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop


@section('scripts')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2();
</script>

@stop
