
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

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Infração</label>
    <div class="col-sm-5">
        {!! Form::select('infracao_id',$infracoes,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selInfracoes']) !!}
    </div>
</div>

<div class="form-group" id="divArtigos" style="display: none;">
    <label for="artigo_id" class="col-sm-2 control-label">Artigo</label>

    <div class="col-md-10" id="divRadios">        
        
    </div>
</div>

<div class="form-group">
    <label for="reclamante_id" class="col-sm-2 control-label">Reclamante</label>
    <div class="col-sm-8">
        {!! Form::select('reclamante_id',$pessoas,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
    </div>
</div>



<div class="form-group">
    <label for="detalhes" class="col-sm-2 control-label">Detalhes</label>
    <div class="col-sm-8">
        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
    </div>
</div>

