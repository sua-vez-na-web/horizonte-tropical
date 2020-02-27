<div class="row">
    <div class="form-group col-md-4">
        <label for="nome">Nome Completo</label>
        {!! Form::text('nome',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        <label for="nome">Email</label>
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        <label for="nome">Telefone</label>
        {!! Form::text('telefone',null,['class'=>'form-control','id'=>'telefone']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="nome">Tipo</label>
        {!! Form::select('tipo',[ 'FISICA'=>'Pessoa Física','JURIDICA'=>'Pessoa Jurídica'],null,[ 'class'=>'form-control select2','id'=>'tipoPessoa']) !!}
    </div>
    <div class="form-group col-md-3" id="inputCpf">
        <label for="nome">CPF</label>
        {!! Form::text('cpf',null,['class'=>'form-control','id'=>'cpf']) !!}
    </div>
    <div class="form-group col-md-3" id="inputCnpj" style="display: none" ">
        <label for="nome">CNPJ</label>
        {!! Form::text('cnpj',null,['class'=>'form-control','id'=>'cnpj']) !!}
    </div>
    <div class="form-group col-md-3">
        <label for="cadastro">Tipo Cadastro</label>
        {!! Form::select('tipo_cadastro',['PROPRIETARIO'=>'Proprietário/Dono','INQUILINO'=>'Inquilino/Residente','FAMILIAR'=>'Familiar/Parente'],null,['class'=>'form-control select2']) !!}
    </div>
</div>


<div class="row">
    <div class="form-group col-md-2">
        <label for="cep">Cep</label>
        {!! Form::text('cep',null,['class'=>'form-control','id'=>'cep']) !!}
    </div>
    <div class="form-group col-md-5">
        <label for="cep">Rua</label>
        {!! Form::text('rua',null,['class'=>'form-control','id'=>'rua']) !!}
    </div>
    <div class="form-group col-md-5">
        <label for="cep">Bairro</label>
        {!! Form::text('bairro',null,['class'=>'form-control','id'=>'bairro']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-5">
        <label for="cep">Cidade</label>
        {!! Form::text('cidade',null,['class'=>'form-control','id'=>'cidade']) !!}
    </div>
    <div class="form-group col-md-2">
        <label for="cep">UF</label>
        {!! Form::text('uf',null,['class'=>'form-control','id'=>'uf']) !!}
    </div>
    <div class="form-group col-md-5">
        <label for="cep">Complemento</label>
        {!! Form::text('complemento',null,['class'=>'form-control','id'=>'complemento']) !!}
    </div>
</div>

@section('js')
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/viaCep.js')}}"></script>
    <script>
        $('#telefone').mask('(00)0-0000-0000');
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep').mask('00.000-000')

        $('#tipoPessoa').change(function(event){
            var tipo = event.target.value;

            if(tipo == 'FISICA'){
                $('#inputCnpj').hide();
                $('#inputCpf').show();
            }else{
                $('#inputCpf').hide();
                $('#inputCnpj').show();
            }
        })
    </script>

@endsection
