<div class="form-group">
    <label for="bloco_id" class="col-sm-2 control-label">Bloco</label>
    <div class="col-sm-8">
        {!! Form::select('proprietario_id',$blocos,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
    </div>
</div>

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Proprietário</label>
    <div class="col-sm-8">
        {!! Form::select('proprietario_id',$pessoas,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-4">
        {!! Form::text('codigo',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Garagens</label>
    <div class="col-sm-2">
        {!! Form::number('garagens',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Prop. Residente</label>
    <div class="col-sm-6">
        {!! Form::checkbox('prop_residente',1,false) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-6">
        {!! Form::select('status',['ALUGADO'=>'Alugado','DESOCUPADO'=>'Desocupado'],null,['class'=>'form-control select2']) !!}
    </div>
</div>



