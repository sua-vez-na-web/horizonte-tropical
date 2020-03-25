@component('mail::message')

Obrigado por receber sua correspondência.

Data Registro: {{date('d/m/Y',strtotime($correspondencia->data_recebimento))}}

Data Entrega: {{ date('d/m/Y',strtotime($correspondencia->data_entrega)) }}

{{--Tipo: {{$correspondencia->tipo}}--}}

**Codigo Unico: {{$correspondencia->uuid}}**

Agradecemos,<br>
    {{ config('app.name') }}
@endcomponent
