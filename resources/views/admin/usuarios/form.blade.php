
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
    {!! Form::text('cpf',null,['class'=>'form-control','placeholder'=>'Somente números']) !!}
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


