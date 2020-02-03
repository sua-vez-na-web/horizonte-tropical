<div class="form-group">
    <label for="bloco_id" class="col-sm-2 control-label">Data do Recebimento</label>
    <div class="col-sm-8">
        {!! Form::date('data_recebimento',null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
</div>

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
    <label for="status" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-8">
        {!! Form::select("status",[
            "ENTREGUE" => "Entregue",
            "PENDENTE DE ENTREGA" => "Pendende de entrega"
        ],null,['class'=>"form-control"]) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Detalhes</label>
    <div class="col-sm-8">
        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
    </div>
</div>

<!-- <div class="form-group">
    <label for="bloco_id" class="col-sm-2 control-label">Data da Entrega</label>
    <div class="col-sm-8">
        {!! Form::date('data_entrega',null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
</div> -->

<!-- <div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-6">
        {!! Form::select('status',['ALUGADO'=>'Alugado','DESOCUPADO'=>'Desocupado'],null,['class'=>'form-control select2']) !!}
    </div>
</div> -->
