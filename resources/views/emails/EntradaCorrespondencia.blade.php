@component('mail::message')
Tem uma correspondência para você lá na portaria.

Data Registro: {{date('d/m/Y',strtotime($correspondencia->data_recebimento))}}

Agradecemos,<br>
{{ config('app.name') }}
@endcomponent
