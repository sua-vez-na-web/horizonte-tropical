<div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Veículo</label>
   <div class="col-md-5">
        {!! Form::text('veiculo',null,['class'=>'form-control']) !!}
   </div>
</div>

<div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Placa</label>
    <div class="col-md-2">
        {!! Form::text('placa',null,['class'=>'form-control','id'=>'placa']) !!}
    </div>
</div>

<div class="form-group">
    <label for="origem" class="col-md-2 control-label">Origem</label>
    <div class="col-md-4">
        {!! Form::select('origem',[
            '1'=>'Propria',
            '2'=>'Terceiros'],
            null,
            ['class'=>'form-control select2','id'=>'selOrigem'])
        !!}
    </div>
</div>
<div id="aptos" style="display:none">
    <div class="form-group">
        <label for="bloco_id" class="col-sm-2 control-label">Bloco</label>
        <div class="col-sm-2">
            {!! Form::select('bloco_id',$blocos,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selBloco']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="apto_id" class="col-sm-2 control-label">Apartamento</label>
        <div class="col-sm-2">
            {!! Form::select('apto_id',$apartamentos,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selApto']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Arquivo de Autorização</label>
        <div class="col-md-2">
            {!! Form::file('upload',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>



@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop


@section('js')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/jquery.mask.min.js')}}"></script>
<script>
    $('.select2').select2();
    $('#placa').mask('AAAAAAA')
    $('#selOrigem').change(function(event){
        var origem = event.target.value;

        if(origem == 2){
            $('#aptos').show();
            return
        }
        $('#aptos').hide();
        return
    })
</script>

@stop


