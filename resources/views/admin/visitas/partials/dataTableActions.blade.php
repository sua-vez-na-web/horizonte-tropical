@if(!$register->dh_saida)
<a href="{{ route('visitas.edit', $register->id)}}" class="btn btn-success btn-xs mx-1">Confirmar Saída</a>
<a href="{{ route('visitas.show', $register->id)}}" class="btn btn-danger btn-xs mx-1">
    <i class="fa fa-trash"></i>
</a>
@else
<p class="label label-danger">Visita Encerrada</p>
@endif



