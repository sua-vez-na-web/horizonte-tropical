@extends('layouts.admin')

@section('content_header')
<h1>
    Relatório de Ocorrências
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('apartamentos.index')}}">Apartamentos</a></li>
    <li class="active">Adicionar Registro</li>
</ol>
@stop

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Relatório Individual de Ocorrências</h3>
                </div>
                <div class="box-body">

                    <form action="{{ route('rpt.ocorrencia.individual') }}" method="post" class="form">
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

                            <div class="form-group col-md-2">
                                <label for="">Penalidade</label>
                                {!! Form::select('penalidade_id',$penalidades,null,['class'=>'form-control','placeholder'=>'Todas']) !!}
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

            @if($result)
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <table class="table data-table table-hover table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>BLOCO - APTO</th>
                                <th>Reclamante</th>
                                <th>Infração</th>
                                <th>Penalidade</th>
                                <th>Status</th>
                                <th>Multa</th>
                                <th>Data</th>
                                <!-- <th>Administrar</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} | APTO: {{$d->apartamento->apto ?? ''}}</td>
                                <td>{{$d->reclamante->nome ?? $d->author->name }}</td>
                                <td>{{$d->infracao->descricao }}</td>
                                <td> <label for="" class="label label-primary }}">{{ $d->penalidade->descricao ?? 'Nenhuma' }}</label></td>
                                <td> <label for="" class="label label-success }}">{{ $d->getStatus($d->status)['status'] ?? '' }}</label></td>
                                <td> {{ $d->multa }}</td>
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
        </div>
    </div>
</div>

@stop
