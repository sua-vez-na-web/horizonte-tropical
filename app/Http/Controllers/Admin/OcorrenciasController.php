<?php

namespace App\Http\Controllers\Admin;

use App\Infracao;
use App\Mail\OcorrenciaRegistrada;
use App\Pessoa;
use Illuminate\Http\Request;
use App\Ocorrencia;
use App\Apartamento;
use App\Bloco;
use App\Http\Controllers\Controller;
use Mail;
use Auth;
class OcorrenciasController extends Controller
{
    public function index()
    {
        $data = Ocorrencia::latest()->get();
        return view('admin.ocorrencias.index', ['data' => $data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');
        $infracoes    = Infracao::pluck("descricao","id");
        $pessoas      = Pessoa::pluck('nome','id');

        return view('admin.ocorrencias.create-edit', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,
            'infracoes' => $infracoes,
            'pessoas' => $pessoas
        ]);
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apartamento_id)
            ->first();


        if ($apartamento) {
            $ocorrencia = $apartamento->ocorrencias()->create([
                'data'          => now(),
                'tipo'          => Ocorrencia::STATUS_REGISTRADA,
                'infracao_id'   => $request->infracao_id,
                'reclamante_id' => $request->reclamante_id ?: Auth::user()->id,
                'detalhes'      => $request->detalhes,
                'autor_id'      => Auth::user()->id
            ]);

            return redirect()->route('ocorrencias.index')->with('msg','Registro Adicionado com Sucesso!');
        }

        return redirect()->back()->with('error','Ocorreu um erro ao efetudar o Procedimento, Entre em contato com Desenvovledor.');
    }

    public function edit($id){

        $ocorrencia     = Ocorrencia::find($id);
        $reincidencias  = Ocorrencia::where('apartamento_id',$ocorrencia->apartamento_id)
                                    ->where('infracao_id',$ocorrencia->infracao_id)
                                    ->whereNotIn('id',[$ocorrencia->id])
                                    ->get();

        return view('admin.ocorrencias.atualizar', [
            'ocorrencia'=>$ocorrencia,
            'reicidencias' => $reincidencias
        ]);

    }

    public function update(Request $request,$id){

        $ocorrencia = Ocorrencia::find($id);

        if($request->reicidencia){
            $multa = Ocorrencia::calculaValorMulta($request->tipo,$request->reicidencias_qty);

            $ocorrencia->penalidade = $request->tipo;
            $ocorrencia->tipo = Ocorrencia::STATUS_CONCLUIDA;
            $ocorrencia->multa = $multa;
            $ocorrencia->save();

            return redirect()->route('ocorrencias.index')->with('msg','Ocorrência Atualizada');
        }

        $multa = Ocorrencia::calculaValorMulta($request->tipo,0);
        $ocorrencia->penalidade = $request->tipo;
        $ocorrencia->tipo =  Ocorrencia::STATUS_CONCLUIDA;
        $ocorrencia->multa = $multa;
        $ocorrencia->save();
        return redirect()->route('ocorrencias.index')->with('msg','Ocorrência Atualizada');

    }

    public function show($id){
        $ocorrencia = Ocorrencia::find($id);

        $ocorrencia->delete();

        return redirect()->route('ocorrencias.index');
    }

    public function updateStatus(Request $request)
    {

        $ocorrencia = Ocorrencia::find($request->ocorrencia);

        if($ocorrencia){
            $ocorrencia->tipo = $request->status == Ocorrencia::STATUS_EM_ANALISE ?
                                Ocorrencia::STATUS_EM_ANALISE
                                : Ocorrencia::STATUS_CONCLUIDA;
            $ocorrencia->penalidade = $request->status == Ocorrencia::STATUS_EM_ANALISE ?
                                null
                                : Ocorrencia::STATUS_CONCLUIDA;
            $ocorrencia->save();

            return redirect()->back()->with('msg','Ocorrência Atualizada');
        }
        return redirect()->back()->with('error','Não foi possível atualizar');
    }
}
