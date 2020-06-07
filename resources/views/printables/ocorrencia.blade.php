<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ato de Infração</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
</head>
<style>
     p {
        line-height:1.2;
    }
</style>
<body>

<div class="header text-center">
    <img src="assets/images/banner.png" alt="">
</div>

<div class="container mt-3">

    <div class="row">
        <p class="font-weight-bold">AO Sr./SRa. <span class="text-danger"> {{$ocorrencia->apartamento->proprietario->nome ?? 'nao informado'}}</span></p>
    </div>

    <div class="row">
        <p class="font-weight-bold">BL/APTO. <span class="text-danger">{{$ocorrencia->apartamento->bloco_id}} / {{$ocorrencia->apartamento->apto}}</span> – RESIDENCIAL HORIZONTE TROPICAL</p>
    </div>    
    
    <div class="row">
        <p class="text-center text-uppercase">Comunicado:</p>
    </div>   

    <div class="row">
        <p>Vimos pelo presente Autuá-lo(a) sobre infração ao item do Regimento Interno, que dizem, respectivamente:</p>
    </div>

    <div class="row">
        <p class="text-uppercase">Penalidade Aplicada: <span class="font-weight-bold text-danger">{{ $ocorrencia->penalidade->descricao }}</span></p>
    </div>

    <div class="row">
        <p class="text-justify font-weight-bold text-danger">
            {{ $ocorrencia->artigoInfracao }} – {{$ocorrencia->artigo->descricao}}
        </p>
    </div>

    

    <div class="row">
        <p class="text-justify text-danger">
        {{$ocorrencia->detalhes ?? 'Sem Detalhes'}}
        </p>
    </div>

    <div class="row">
        <p class="font-weight-bold text-uppercase">
        Solicitamos que não haja reincidência nessa infração sob pena de serem aplicadas as sanções
previstas nas normas vigentes do Condomínio.
        </p>
    </div>

    <div class="row text-left">
    <p>João Pessoa, {{date('d/m/Y',strtotime($ocorrencia->data)) }}.</p>
</div>

    <div class="row mt-3">
        <p class="text-right">
            A Administração.
        </p>
    </div>

    <div class="row text-center mt-2">
        <p>Responsável:</p>
        <p><hr></p>
    </div>

    <div class="row text-center">
        <small>Assinatura de Autenticidade do Documento: {{$ocorrencia->uuid}}</small>
    </div>
    
</div>
    




</body>

</html>