<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Descricao</label>
    <div class="col-sm-5">
        {!! Form::text('descricao',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="proprietario_id" class="col-sm-2 control-label">Multa</label>
    <div class="col-sm-2">
        {!! Form::text('multa',null,['class'=>'form-control money']) !!}
    </div>
</div>

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@stop


@section('js')
<!-- Select2 -->
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script>
    $(".money").mask('###0.00', {
        reverse: true
    });
</script>

@stop

