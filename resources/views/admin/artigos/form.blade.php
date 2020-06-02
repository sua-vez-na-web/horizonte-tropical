<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Descricao</label>
    <div class="col-sm-5">
        {!! Form::text('descricao',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-2">
        {!! Form::text('codigo',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Infração</label>
    <div class="col-sm-8">
        {!! Form::select("infracao_id",$infracoes,null,['class'=>"form-control","placeholder"=>"Selecione..."]) !!}
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Penalidade</label>
    <div class="col-sm-8">
        {!! Form::select("penalidade_id",$penalidades,null,['class'=>"form-control","placeholder"=>"Selecione..."]) !!}
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
    // var bloco_id;
    // var apto_id;
    // var pesssoas = [];
    // var pessoa = {};
    // $('.select2').select2();

    // $('#selBloco').change(function(event){
    //     bloco_id = event.target.value;
    //     getRecebedores(apto_id,bloco_id);
    // })

    // $('#selApto').change(function(event){
    //     apto_id = event.target.value;

    //     getRecebedores(apto_id,bloco_id);
    // })

    // function getRecebedores(apto,bloco){
    //     if(bloco == null || ""){
    //         alert('selecione um bloco');
    //         return;
    //     }
    //     if(apto == null || ""){
    //         alert('selecione um apto');
    //         return;
    //     }

    //     $.getJSON(`/admin/ajaxMoradores?bloco=${bloco}&apto=${apto}`,function(response){

    //         if(response.moradores.length > 0){
    //             pessoas = response.moradores;
    //             var option = '<option>Selecione o Recebedor</option>';
    //                 $.each(response.moradores, function(i,obj){
    //                     option += `<option value="${obj.id}" data-index="${i}">${obj.nome}</option>`;
    //                 })
    //             $('#selRecebedores').html(option).attr('disabled',false);
    //             return
    //         }
    //         alert('Nenhum morador encontrado')
    //         return
    //     })
    // }
</script>

@stop

