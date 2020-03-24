@component('mail::message')
    Sr./Sra {{ $ocorrencia->inquilino->nome ?? 'nome' }},

Uma Ocorrência foi Registrada e viemos por meio desde email comunicar.

##Informações da Ocorrência:

Art. {{ $ocorrencia->infracao->codigo }} {{$ocorrencia->infracao->descricao}}

Data Registro {{ date('d/m/Y',strtotime($ocorrencia->data)) }}

##Detalhes da Ocorrência
__{{ $ocorrencia->detalhes ?? 'não informado'}}__

@endcomponent


