



@if(!$register->data_entrega)
<a href="{{ route('correspondencias.edit', $register->id) }}" class="btn btn-primary btn-xs">Baixar
    Recebimento</a>
<a href="{{ route('correspondencias.show',$register->id) }}" class="btn btn-danger btn-xs">
    <i class="fa fa-trash"></i>
</a>
@endif
<a href="{{ route('correspondencias.edit',$register->id)}}" class="btn btn-default btn-xs">Ver</a>

