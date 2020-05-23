
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

@if(!Request::has('type'))
    <div class="form-group">
        <label for="morador_presente" class="col-sm-2 control-label">Morador Presente</label>
        <div class="col-sm-8">
            {!! Form::checkbox("morador_presente",1,false) !!}
        </div>
    </div>
@endif

<div class="row" id="visitantes">
   <div class="form-group">
        <label for="" class="col-sm-2 control-label">Visitante 1</label>
        <div class="col-sm-4">
            <input type="text" name="visitante[]" class="form-control" placeholder="Informe o Nome">
        </div>
        <div class="col-sm-2">
            <select name="doc_tipo[]" id="" class="form-control">
                <option value="CPF">CPF</option>
                <option value="RG">RG</option>
                <option value="CNH">CNH</option>
            </select>
        </div>
        <div class="col-sm-2">
            <input type="text" name="documento[]" class="form-control" placeholder="Numero">
        </div>
        <div class="col-sm-2">
            <button class="btn btn-primary btnAdd" type="button" ><i class="fa fa-plus success"></i></button>
        </div>
   </div>
</div>

@section('js')
<script>
    var visitantes = 1;
    $('body').on('click','.btnAdd',function(){
        var html = newLine();
        console.log(html);
        visitantes++;
        $("#visitantes").append(html);
    })

    function newLine(){
        return `<div class="form-group">
                    <label for="" class="col-sm-2 control-label">Visitante ${visitantes+1}</label>
                    <div class="col-sm-4">
                        <input type="text" name="visitante[]" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <select name="doc_tipo[]" id="" class="form-control">
                            <option value="CPF">CPF</option>
                            <option value="RG">RG</option>
                            <option value="CNH">CNH</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="documento[]" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btnAdd" type="button"><i class="fa fa-plus success"></i></button>
                    </div>
                </div>`
    }
</script>
@endsection
