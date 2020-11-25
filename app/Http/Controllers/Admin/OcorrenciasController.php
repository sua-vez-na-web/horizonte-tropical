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
use App\Penalidade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use PDF;
use Ramsey\Uuid\Uuid;

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

        // dd($request->all());
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apartamento_id)
            ->first();


        if ($apartamento) {
            $ocorrencia = $apartamento->ocorrencias()->create([
                'data'          => now(),
                'status'        => Ocorrencia::STATUS_REGISTRADA,
                'infracao_id'   => $request->infracao_id,
                'artigo_id'     => $request->artigo_id,
                'reclamante_id' => $request->reclamante_id ?: Auth::user()->id,
                'detalhes'      => $request->detalhes,
                'uuid'          => Uuid::uuid4(),
                'autor_id'      => Auth::user()->id
            ]);

            return redirect()->route('ocorrencias.index')->with('msg','Registro Adicionado com Sucesso!');
        }

        return redirect()->back()->with('error','Ocorreu um erro ao efetudar o Procedimento, Entre em contato com Desenvovledor.');
    }

    public function edit($id){

        $ocorrencia     = Ocorrencia::find($id);
        $reincidencias  = Ocorrencia::where('apartamento_id',$ocorrencia->apartamento_id)
                                    ->where('artigo_id',$ocorrencia->artigo_id)
                                    ->where('is_denied',0)
                                    ->where('penalidade_id','<>',4)
                                    ->whereNotIn('id',[$ocorrencia->id])
                                    ->get();
        $penalidades   = Penalidade::pluck('descricao','id');

        return view('admin.ocorrencias.atualizar', [
            'ocorrencia'   =>$ocorrencia,
            'reicidencias' => $reincidencias,
            'penalidades'  => $penalidades
        ]);

    }

    public function toPunish(Request $request,$id){


        // dd($request->all());
        $ocorrencia = Ocorrencia::find($id);
        $penalidade = Penalidade::find($request->penalidade_id);

        if($request->reicidencia){
            $reincidencias = Ocorrencia::contaReicidencias($ocorrencia);
            //dd($multa);
            $ocorrencia->penalidade_id  = $request->penalidade_id;
            $ocorrencia->status         = Ocorrencia::STATUS_CONCLUIDA;
            $ocorrencia->multa          = $penalidade->multa * $reincidencias;
            $ocorrencia->save();

            if($ocorrencia->apartamento->inquilino){
                Mail::to($ocorrencia->apartamento->inquilino->email)
                    ->send(new OcorrenciaRegistrada($ocorrencia));
            }
            if($ocorrencia->apartamento->proprietario){
                Mail::to($ocorrencia->apartamento->proprietario->email)
                    ->send(new OcorrenciaRegistrada($ocorrencia));
            }

            return redirect()->route('ocorrencias.index')->with('msg','Ocorrência Atualizada');
        }

        if($request->multa)
            $ocorrencia->multa = $penalidade->multa;

        $ocorrencia->penalidade_id = $request->penalidade_id;
        $ocorrencia->status        =  Ocorrencia::STATUS_CONCLUIDA;
        $ocorrencia->save();

        if($ocorrencia->apartamento->inquilino){
            Mail::to($ocorrencia->apartamento->inquilino->email)
                ->send(new OcorrenciaRegistrada($ocorrencia));
        }
        if($ocorrencia->apartamento->proprietario){
            Mail::to($ocorrencia->apartamento->proprietario->email)
                ->send(new OcorrenciaRegistrada($ocorrencia));
        }

        return redirect()->route('ocorrencias.index')->with('msg','Ocorrência Atualizada');

    }

    public function show($id){
        $ocorrencia = Ocorrencia::find($id);

        $ocorrencia->delete();

        return redirect()->route('ocorrencias.index');
    }

    public function markAsInReview($id)
    {

        $ocorrencia = Ocorrencia::find($id);
        $ocorrencia->status = Ocorrencia::STATUS_EM_ANALISE;
        $ocorrencia->save();

        return redirect()->back()->with('msg','Ocorrencia Atualizada');
    }

    public function print($uuid)
    {
        $ocorrencia = Ocorrencia::where('uuid',$uuid)->firstOrFail();
        // dd($ocorrencia->apartamento->proprietario);
        $pdf = PDF::loadView('printables.ocorrencia',compact('ocorrencia') );
        $pdf->setPaper('a4');

        return $pdf->stream();

    }

    public function markAsDenied($id)
    {
        $ocorrencia = Ocorrencia::find($id);

        $ocorrencia->is_denied = 1;
        $ocorrencia->status = Ocorrencia::STATUS_CONCLUIDA;
        $ocorrencia->save();

        return redirect()->route('ocorrencias.index');
    }
}
