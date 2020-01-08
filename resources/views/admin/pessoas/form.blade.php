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
        {!! Form::select('tipo',[ 'FISICA'=>'Pessoa Física','JURIDICA'=>'Pessoa Jurídica'],null,[ 'class'=>'form-control select2']) !!}
    </div>
    <div class="form-group col-md-3">
        <label for="nome">CPF</label>
        {!! Form::text('cpf',null,['class'=>'form-control','id'=>'cpf']) !!}
    </div>
    <div class="form-group col-md-3">
        <label for="nome">CNPJ</label>
        {!! Form::text('cnpj',null,['class'=>'form-control','id'=>'cnpj']) !!}
    </div>
    <div class="form-group col-md-3">
        <label for="cadastro">Tipo Cadastro</label>
        {!! Form::select('tipo_cadastro',['PROPRIETARIO'=>'Proprietário/Dono','INQUILINO'=>'Inquilino/Residente','FAMILIAR'=>'Familiar/Parente'],null,['class'=>'form-control select2']) !!}
    </div>
</div>

@section('js')
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script>
        $('#telefone').mask('(00)0-0000-0000');
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
    </script>

@endsection
