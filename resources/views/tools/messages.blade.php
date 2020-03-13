@if(session('msg'))
<div class="alert alert-success" role="alert">{{ session('msg')}}</div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">{{ session('error')}}</div>
@endif

@if(session('warning'))

    <div class="alert alert-warning alert-dismissible">
        <span class="white-text">{{session('warning')}}
        </span>
    </div>

@endif

@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
            <p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </p>
</div>
@endif

