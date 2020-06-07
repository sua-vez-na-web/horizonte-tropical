@component('mail::message')

@if($ocorrencia->apartamento->inquilino)
    Sr./Sra {{ $ocorrencia->apartamento->inquilino->nome ?? 'nome' }},
@endif

@if($ocorrencia->apartamento->proprietario)
    Sr./Sra {{ $ocorrencia->apartamento->proprietario->nome ?? 'nome' }},
@endif

##Comunicado
    Uma Ocorrência foi Registrada.

Art. {{ $ocorrencia->infracao->codigo }} {{$ocorrencia->infracao->descricao}}

@component('mail::button', ['url' => route('ocorrencia.print',$ocorrencia->uuid)])
    Visualizar Documento
@endcomponent

Data Registro {{ date('d/m/Y',strtotime($ocorrencia->data)) }}

@endcomponent


