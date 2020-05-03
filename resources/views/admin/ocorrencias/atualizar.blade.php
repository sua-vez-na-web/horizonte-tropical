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
                    <div class="callout callout-danger">
                        <h4>Infração Registrada: Art. {{  $ocorrencia->infracao->codigo  }}</h4>
                        <p>{{ $ocorrencia->infracao->descricao }}</p>
                    </div>
                </div>
                <div class="box-boby">
                    <dl class="dl-horizontal">
                        <dt>Status</dt>
                        <dd><label for="" class="label label-{{$ocorrencia->getStatus($ocorrencia->tipo)['class'] }}">{{ $ocorrencia->getStatus($ocorrencia->tipo)['status'] ?? '' }}</label></dd>
                        <dt>Penalidade</dt>
                        <dd><label for="" class="label label-{{$ocorrencia->getPenalidade($ocorrencia->tipo)['class'] }}">{{ $ocorrencia->getPenalidade($ocorrencia->tipo)['status'] ?? '' }}</label></dd>
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
                        @if($ocorrencia->tipo == \App\Ocorrencia::STATUS_REGISTRADA)
                            <a href="{{ route('ocorrencia.setStatus',['ocorrencia'=>$ocorrencia->id,'status'=>\App\Ocorrencia::STATUS_EM_ANALISE ]) }}" class="btn btn-warning"><i class="fa fa-bell"></i> Ir para Análise</a>
                            <a href="{{ route('ocorrencia.setStatus',['ocorrencia'=>$ocorrencia->id,'status'=>\App\Ocorrencia::STATUS_NOTIFICADA ]) }}" class="btn btn-primary"><i class="fa fa-bell"></i> Notificar</a>
                        @elseif($ocorrencia->tipo == \App\Ocorrencia::STATUS_EM_ANALISE)
                            <a href="#" data-toggle="modal" data-target="#modalAtualizar" class="btn btn-primary"><i class="fa fa-bullhorn"></i> Aplicar Penalidade</a>
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
                </div>
                <form action="{{ route('ocorrencias.update',$ocorrencia->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Penalidade</label>
                            <select name="tipo" id="" class="form-control">
                                <option value="{{ \App\Ocorrencia::TIPO_LEVE }}">LEVE</option>
                                <option value="{{ \App\Ocorrencia::TIPO_MEDIA }}">MEDIA</option>
                                <option value="{{ \App\Ocorrencia::TIPO_GRAVE }}">GRAVE</option>
                            </select>
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
