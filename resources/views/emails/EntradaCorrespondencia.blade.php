@component('mail::message')
Tem uma correspondência para você lá na portaria.

Data Registro: {{date('d/m/Y',strtotime($correspondencia->data_recebimento))}}

Tipo: {{$correspondencia->getType($correspondencia->tipo)}}

Detalhes: {{$correspondencia->detalhes}}

Agradecemos,<br>
{{ config('app.name') }}
@endcomponent
