    <div class="form-group">
        <label for="cadastro" class="col-sm-2 control-label">Tipo Cadastro</label>
        <div class="col-md-5">
            {!! Form::select('tipo_cadastro',[
                '1' =>'Proprietário Residente',
                '2' =>'Proprietário Não Residente',
                '3' =>'Inquilino',
                '4' =>'Dependente'],
            null,['class'=>'form-control select2','id'=>'selTipoCadastro']) !!}
        </div>
    </div>

    <div id="selParent" style="display:none">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Dependende de:</label>
            <div class="col-md-5">
                <select name="dependente_id" id="dependentes" class="form-control select2">

                </select>
            </div>
        </div>
    </div>

    @if(isset($pessoa) && $pessoa->tipo_cadastro == \App\Pessoa::DEPENDENTE)
            <div class="form-group">
                <label for="dependente" class="col-sm-2 control-label">Dependente</label>
                    <div class="col-md-5">
                    {!! Form::select('recebedor_id',$pessoas,null,['class'=>'form-control select2']) !!}
                    </div>
            </div>
    @endif

    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome Completo</label>
        <div class="col-md-5">
            {!! Form::text('nome',null,['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Email</label>
        <div class="col-md-5">
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Telefone</label>
        <div class="col-md-5">
            {!! Form::text('telefone',null,['class'=>'form-control','id'=>'telefone']) !!}
        </div>
    </div>


    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Tipo</label>
        <div class="col-md-3">
            {!! Form::select('tipo',
                [
                '1'=>'Pessoa Física',
                '2'=>'Pessoa Jurídica'
                ],null,
                [ 'class'=>'form-control select2',
                  'id'=>'tipoPessoa'
                ]
            )!!}
        </div>
    </div>

    <div class="form-group" id="inputCpf">
        <label for="nome" class="col-sm-2 control-label">CPF</label>
        <div class="col-md-3">
            {!! Form::text('cpf',null,['class'=>'form-control','id'=>'cpf']) !!}
        </div>
    </div>

    <div class="form-group" id="inputCnpj" style="display: none">
        <label for="nome" class="col-sm-2 control-label">CNPJ</label>
        <div class="col-md-3">
            {!! Form::text('cnpj',null,['class'=>'form-control','id'=>'cnpj']) !!}
        </div>
    </div>



    <div style="display:none" id="divEndereco">
    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">Cep</label>
        <div class="col-md-2">
            {!! Form::text('cep',null,['class'=>'form-control','id'=>'cep']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">Rua</label>
        <div class="col-md-4">
            {!! Form::text('rua',null,['class'=>'form-control','id'=>'rua']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">Bairro</label>
        <div class="col-md-3">
            {!! Form::text('bairro',null,['class'=>'form-control','id'=>'bairro']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">Cidade</label>
        <div class="col-md-3">
            {!! Form::text('cidade',null,['class'=>'form-control','id'=>'cidade']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">UF</label>
        <div class="col-md-2">
            {!! Form::text('uf',null,['class'=>'form-control','id'=>'uf']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-2 control-label">Complemento</label>
        <div class="col-md-2">
            {!! Form::text('complemento',null,['class'=>'form-control','id'=>'complemento']) !!}
        </div>
    </div>
    </div>

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop

@section('js')
    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/viaCep.js')}}"></script>
    <script>
        $('.select2').select2();

        $('#telefone').mask('(00)0-0000-0000');
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep').mask('00.000-000')

        $('#tipoPessoa').change(function(event){
            var tipo = event.target.value;

            if(tipo == 1){
                $('#inputCnpj').hide();
                $('#inputCpf').show();
            }else{
                $('#inputCpf').hide();
                $('#inputCnpj').show();
            }
        })

        $('#selTipoCadastro').change(function(event){
            var tipoCadastro = event.target.value;

            if(tipoCadastro == 4){

                $.getJSON(`/admin/ajaxPessoas`,function(response){
                    var option = '<option>Selecione o Dependente</option>';
                    $.each(response, function(i,obj) {
                        option += `<option value="${obj.id}">${obj.nome}</option>`;
                    })

                    $('#dependentes').html(option);
                })
                $('#selParent').show();
                return
            }
            if(tipoCadastro == 2){
                $('#divEndereco').show();
                return
            }
            $('#divEndereco').hide();
            $('#selParent').hide();
            return
        })
    </script>

@endsection
