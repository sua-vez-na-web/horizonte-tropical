<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Bloco</label>
    <div class="col-sm-2">
        {!! Form::select('bloco_id',$blocos,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selBloco']) !!}
    </div>
</div>

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Apartamento</label>
    <div class="col-sm-2">
        {!! Form::select('apartamento_id',$apartamentos,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selApto']) !!}
    </div>
</div>

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Recebedor</label>

    <div class="col-md-5">
        <select name="recebedor_id" id="selRecebedores" class="form-control select2" disabled>

        </select>
    </div>
</div>

{{--<div class="form-group">--}}
{{--    <label for="status" class="col-sm-2 control-label">Status</label>--}}
{{--    <div class="col-sm-8">--}}
{{--        {!! Form::select("status",[--}}
{{--            "ENTREGUE" => "Entregue",--}}
{{--            "PENDENTE DE ENTREGA" => "Pendende de entrega"--}}
{{--        ],null,['class'=>"form-control","placeholder"=>"Selecione..."]) !!}--}}
{{--    </div>--}}
{{--</div>--}}

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Tipo</label>
    <div class="col-sm-8">
        {!! Form::select("tipo",[
            "1" => "Conta de Água",
            "2" => "Conta de Energia",
            "3" => "Conta de Internet",
            "4" => "Taxa Condominial",
            "5" => "Outras correspondências"
        ],null,['class'=>"form-control","placeholder"=>"Selecione..."]) !!}
    </div>
</div>

<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Detalhes</label>
    <div class="col-sm-8">
        {!! Form::textarea('detalhes',null,['class'=>'form-control']) !!}
    </div>
</div>

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop


@section('js')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    var bloco_id;
    var apto_id;
    var pesssoas = [];
    var pessoa = {};
    $('.select2').select2();

    $('#selBloco').change(function(event){
        bloco_id = event.target.value;
        getRecebedores(apto_id,bloco_id);
    })

    $('#selApto').change(function(event){
        apto_id = event.target.value;

        getRecebedores(apto_id,bloco_id);
    })

    function getRecebedores(apto,bloco){
        if(bloco == null || ""){
            alert('selecione um bloco');
            return;
        }
        if(apto == null || ""){
            alert('selecione um apto');
            return;
        }

        $.getJSON(`/admin/ajaxMoradores?bloco=${bloco}&apto=${apto}`,function(response){

            if(response.moradores.length > 0){
                pessoas = response.moradores;
                var option = '<option>Selecione o Recebedor</option>';
                    $.each(response.moradores, function(i,obj){
                        option += `<option value="${obj.id}" data-index="${i}">${obj.nome}</option>`;
                    })
                $('#selRecebedores').html(option).attr('disabled',false);
                return
            }
            alert('Nenhum morador encontrado')
            return
        })
    }
</script>

@stop

