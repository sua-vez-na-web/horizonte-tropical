
<div class="form-group">
    <label for="nome">Nome</label>
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="nome">Email</label>
    {!! Form::text('email',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="nome">CPF</label>
    {!! Form::text('cpf',null,['class'=>'form-control','placeholder'=>'Somente números','id'=>'cpf']) !!}
</div>
<div class="form-group">
    <label for="nome">Telefone</label>
    {!! Form::text('telefone',null,['class'=>'form-control','placeholder'=>'Somente números','id'=>'telefone']) !!}
</div>
<div class="form-group">
    <label for="nome">Senha</label>
    {!! Form::password('password',['class'=>'form-control','placeholder'=>"se estiver editanto, deixe vazio para manter a atual"]) !!}
</div>
<div class="form-group">
    <label for="cargo">Tipo</label>
    {!! Form::select('cargo',[
        '1'=>'Síndico',
        '2'=>'Porteiro'],
        null,
        [ 'class'=>'form-control select2'])
    !!}
</div>

@section('js')
<script src="{{asset('js/jquery.mask.min.js')}}"></script>
<script>
    $('#telefone').mask('(99)9.9999-9999')
    $('#cpf').mask('999.999.999-99')
</script>
@endsection

