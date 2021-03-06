@extends('layouts.admin')

@section('content_header')
    <h1>
        Registro de Ocorrência
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('ocorrencias.index')}}">Registro de Correspondências</a></li>

        <li class="active">Adicionar Registro</li>
    </ol>
@stop

@section("content")
   <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="callout callout-info">
                        <h4>Infração Registrada: {{  $ocorrencia->infracao->descricao  }}</h4>
                        <p>Art. {{ $ocorrencia->artigo->codigo }} | {{ $ocorrencia->artigo->descricao }}</p>
                    </div>
                </div>
                <div class="box-boby">
                    <dl class="dl-horizontal">
                        <dt>Status</dt>
                        <dd><label for="" class="label label-{{$ocorrencia->getStatus($ocorrencia->status)['class'] }}">{{ $ocorrencia->getStatus($ocorrencia->status)['status'] ?? '' }}</label></dd>
                        <dt>Penalidade</dt>
                        <dd><label for="" class="label label-primary">{{ $ocorrencia->penalidade->descricao ?? '' }}</label></dd>
                        <dt>Multa</dt>
                        <dd>R$ {{  number_format($ocorrencia->multa,2,',','.') ?? 'N/a'}}</dd>
                        <dt>Bloco - Apartamento</dt>
                        <dd>{{ $ocorrencia->apartamento->bloco_id  }} - {{ $ocorrencia->apartamento->apto }}</dd>
                        <dt>Data da Ocorrência</dt>
                        <dd>{{ date('d/m/Y',strtotime($ocorrencia->data)) }}</dd>
                        <dt>Inquilino</dt>
                        <dd>{{ $ocorrencia->apartamento->inquilino->nome ?? 'Não Informado' }}</dd>
                        <dt>Proprietário</dt>
                        <dd>{{ $ocorrencia->apartamento->proprietario->nome ?? 'Não Informado' }}</dd>
                        <dt>Reclamante</dt>
                        <dd>{{ $ocorrencia->reclamante->nome ?? $ocorrencia->author->name }}</dd>
                        <dt>Detalhes</dt>
                        <dd>{{ $ocorrencia->detalhes ?? ''}}</dd>
                    </dl>
                </div>
                <div class="box-footer">
                    <a href="{{ route('ocorrencias.index') }}" class="btn btn-default"> Voltar</a>
                    <div class="pull-right">
                        @if($ocorrencia->status == \App\Ocorrencia::STATUS_REGISTRADA)
                            <a href="{{ route('ocorrencia.inReview',$ocorrencia->id) }}" class="btn btn-warning">Ir para Análise</a>
                            <a href="{{ route('ocorrencia.denied',$ocorrencia->id) }}" class="btn btn-danger">Negar</a>
                        @elseif($ocorrencia->status == \App\Ocorrencia::STATUS_EM_ANALISE)
                            <a href="#" data-toggle="modal" data-target="#modalAtualizar" class="btn btn-primary"><i class="fa fa-bullhorn"></i> Aplicar Penalidade</a>
                        @elseif($ocorrencia->status == \App\Ocorrencia::STATUS_CONCLUIDA && $ocorrencia->is_denied == 0)
                            <a href="{{ route('ocorrencia.print',$ocorrencia->uuid) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Ato de Infração</a>
                        @endif
                    </div>
                </div>
            </div>
       </div>
       <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h2 class="box-title">Reincidências da mesma ocorrência ( {{ $reicidencias->count() ?? 0 }} )</h2>
                </div>
                <div class="box-body">
                    <table class="table data-table table-hover table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>BLOCO - APTO</th>
                                <th>Reclamante</th>
                                <th>Infração</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reicidencias as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>BLOCO: {{$d->apartamento->bloco->codigo ?? ''}} | APTO: {{$d->apartamento->apto ?? ''}}</td>
                                <td>{{$d->reclamante->nome ?? $d->author->name }}</td>
                                <td>ART: {{$d->infracao->codigo}} |{{$d->infracao->descricao }}</td>
                                <td> {{ date('d/m/Y',strToTime($d->data) ) ?? '' }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>
   <div class="row">

    </div>

   <div class="row">
        <div class="modal fade in" id="modalAtualizar">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Atualizar Registro de Ocorrência</h4>
                    <p class="label label-success">Penalidade Recomendada: {{ $ocorrencia->artigo->penalidade->descricao }}</p>
                </div>
                <form action="{{ route('ocorrencia.punir',$ocorrencia->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Selecione a Penalidade para ser Aplicada:</label>
                            {!! Form::select('penalidade_id',$penalidades,null,['class'=>'form-control select2','placeholder'=>'Selecione...','id'=>'selInfracoes']) !!}
                        </div>
                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="multa" value="1">
                                           Aplicar Multa?
                                    </label>
                                </div>
                            </div>
                        @if($reicidencias->count() > 0)
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="reicidencia" value="1">
                                            Aplicar Reincidências: {{ $reicidencias->count() }} X
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $reicidencias->count() }}" name="reicidencias_qty">
                            <input type="hidden" value="{{ $ocorrencia->id }}" name="ocorrencia_id">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aplicar</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
   </div>
@stop
