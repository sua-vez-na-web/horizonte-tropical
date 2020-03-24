<div class="form-group">
    <label for="bloco_id" class="col-sm-2 control-label">Data da Ocorrência</label>
    <div class="col-sm-8">
        {!! Form::date('data',null,['class'=>'form-control','placeholder'=>'']) !!}
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
    <label for="proprietario_id" class="col-sm-2 control-label">Infração</label>
    <div class="col-sm-8">
        {!! Form::select('infracao_id',$infracoes,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
    </div>
</div>

<div class="form-group">
    <label for="reclamante_id" class="col-sm-2 control-label">Reclamante</label>
    <div class="col-sm-8">
        {!! Form::select('reclamante_id',$pessoas,null,['class'=>'form-control select2','placeholder'=>'Selecione...']) !!}
    </div>
</div>

<!-- @can('sindico')

<div class="form-group">
    <label for="penalidade" class="col-sm-2 control-label">Penalidade</label>
    <div class="col-sm-8">
        {!! Form::select("penalidade",[
            "MEDIA" => "Média",
            "LEVE" => "Leve",
            "GRAVE" => "Grave",
        ],null,['class'=>"form-control"]) !!}
    </div>
</div>


<div class="form-group">
    <label for="tipo" class="col-sm-2 control-label">Tipo de Penalidade</label>
    <div class="col-sm-8">
        {!! Form::select("tipo",[
            "NOTIFICACAO" => "Notificação",
            "MULTA" => "Multa",
            "OCORRENCIA" => "Ocorrência",
        ],null,['class'=>"form-control"]) !!}
    </div>
</div>

<div class="form-group">
    <label for="multa" class="col-sm-2 control-label">Multa</label>
    <div class="col-sm-8">
        {!! Form::text("multa",null,["class"=>"form-control"]) !!}
    </div>
</div>
@endcan -->

<div class="form-group">
    <label for="detalhes" class="col-sm-2 control-label">Detalhes</label>
    <div class="col-sm-8">
        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
    </div>
</div>

