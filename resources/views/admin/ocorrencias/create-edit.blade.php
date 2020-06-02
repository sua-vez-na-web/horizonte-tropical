@extends('layouts.admin')

@section('content_header')
<h1>
    Registro de Ocorrências

</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('ocorrencias.index')}}">Registro de Ocorrências</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar Registro</h3>
    </div>
    @if(isset($ocorrencia))
    {!! Form::model($ocorrencia,['route'=>['ocorrencias.update',$ocorrencia->id],'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
    @method('PUT')
    @else
    {!! Form::open(['route'=>'ocorrencias.store','enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
    @endif
    <div class="box-body">
        @include('admin.ocorrencias.form')
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
    
    var artigos = [];   
    
    $('.select2').select2();

    $('#selInfracoes').change(function(event){
        infracao_id = event.target.value;
        getArtigos(infracao_id);
    })  

    function getArtigos(infracao_id){
        if(infracao_id == null || ""){
            alert('selecione uma Infracao');
            return;
        }       

        $.getJSON(`/admin/ajaxArtigos?infracao_id=${infracao_id}`,function(response){

            if(response.artigos.length > 0){
                artigos = response.artigos;
                var option = '<option>Selecione o Artigo</option>';
                    $.each(response.artigos, function(i,obj){
                        option += `<option value="${obj.id}" data-index="${i}">${obj.descricao}</option>`;
                    })
                $('#selArtigos').html(option).attr('disabled',false);
                return
            }
                 alert('Nenhum Artigo Cadastrado para essa Infração')
            return
        })
    }

</script>

@stop
