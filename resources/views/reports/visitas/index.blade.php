@extends('layouts.admin')



@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Relatório Individual de Visitas
                </div>
                <div class="panel-body">

                    <form action="{{ route('rpt.visitas.seach') }}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="">Bloco</label>
                                {!! Form::select('bloco_id',$blocos,null,['class'=>'form-control','placeholder'=>'selecione']) !!}
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">Apto</label>
                                {!! Form::select('apto_id',$apartamentos,null,['class'=>'form-control','placeholder'=>'selecione']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Inicio</label>
                                <input type="date" name="dt_inicio" id="" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Final</label>
                                <input type="date" name="dt_final" id="" class="form-control">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Consultar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($result)
<div class="panel">
    <div class="panel-header">
    </div>
    <div class="panel-body">
        <table class="table data-table table-hover table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>BLOCO - APTO</th>
                    <!-- <th>Reclamante</th>
                    <th>Infração</th>
                    <th>Penalidade</th>
                    <th>Status</th>
                    <th>Multa</th> -->
                    <th>Data</th>
                    <!-- <th>Administrar</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} | APTO: {{$d->apartamento->apto ?? ''}}</td>

                    <td> {{ date('d/m/Y',strtotime($d->data)) }}</td>
                    {{-- <!-- <td>
                        @cannot('funcionario')
                            <a href="{{ route('ocorrencias.edit', $d->id)}}" class="btn btn-primary btn-xs mx-1">Administrar</a>
                    @endcannot
                    <a href="{{route('get.upload',$d->id)}}" class="btn btn-success btn-xs mx-1">
                        <i class="fa fa-photo"></i>
                    </a>
                    @if($d->status != \App\Ocorrencia::STATUS_CONCLUIDA)
                    <a href="{{ route('ocorrencias.show', $d->id)}}" class="btn btn-danger btn-xs mx-1">
                        <fa class="fa fa-trash"></fa>
                    </a>
                    @endif
                    </td> --> --}}
                </tr>
                @empty
                <p class="label label-danger">Nenhum Resultado</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endif

@stop
