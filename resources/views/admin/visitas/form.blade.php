
@if(!Request::has('type'))
    <div class="form-group">
        <label for="proprietario_id" class="col-sm-2 control-label">Bloco</label>
        <div class="col-sm-8">
            {!! Form::select('bloco_id',$blocos,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="proprietario_id" class="col-sm-2 control-label">Apartamento</label>
        <div class="col-sm-8">
            {!! Form::select('apartamento_id',$apartamentos,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
        </div>
    </div>
    <input type="hidden" name="tecnica" value="0">
@else
    <div class="form-group">
        <label for="tecnico" class="col-sm-2 control-label">Nome da Empresa</label>
        <div class="col-sm-8">
            {!! Form::text('empresa',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <input type="hidden" name="tecnica" value="1">
@endif

<div class="form-group">
    <label for="agendado" class="col-sm-2 control-label">Agendado</label>
    <div class="col-sm-8">
        {!! Form::checkbox("agendado",1,false) !!}
    </div>
</div>

<div class="form-group">
    <label for="nome_visitante" class="col-sm-2 control-label">Visitante/Resp.</label>
    <div class="col-sm-8">
        {!! Form::text("nome_visitante",null,["class"=>"form-control"]) !!}
    </div>
</div>

<div class="form-group">
    <label for="rg_visitante" class="col-sm-2 control-label">Documento</label>
    <div class="col-sm-4">
        {!! Form::text("rg_visitante",null,["class"=>"form-control"]) !!}
    </div>
</div>

<div class="form-group">
    <label for="morador_presente" class="col-sm-2 control-label">Morador Presente</label>
    <div class="col-sm-8">
        {!! Form::checkbox("morador_presente",1,false) !!}
    </div>
</div>
