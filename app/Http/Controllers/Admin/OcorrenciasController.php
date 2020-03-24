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

        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apartamento_id)
            ->first();


        if ($apartamento) {
            $ocorrencia = $apartamento->ocorrencias()->create([
                'data'          => $request->data,
                'infracao_id'   => $request->infracao_id,                
                'reclamante_id' => $request->reclamante_id,
                'detalhes'      => $request->detalhes
            ]);

            if($apartamento->inquilino){
                Mail::to($apartamento->inquilino->email)
                    ->cc('matthausnawan@gmail.com')
                    ->queue(new OcorrenciaRegistrada($ocorrencia));
            }
            if($apartamento->proprietario){
                 Mail::to($apartamento->inquilino->email)
                    ->cc('matthausnawan@gmail.com')
                    ->queue(new OcorrenciaRegistrada($ocorrencia));
            }

            return redirect()->route('ocorrencias.index')->with('msg','Registro Adicionado com Sucesso!');
        }

        return redirect()->back()->with('error','Ocorreu um erro ao efetudar o Procedimento, Entre em contato com Desenvovledor.');
    }

    public function edit($id){

        $ocorrencia = Ocorrencia::find($id);
        return view('admin.ocorrencias.atualizar', ['ocorrencia'=>$ocorrencia]);

    }

    public function update(Request $request,$id){

        $ocorrencia = Ocorrencia::find($id);

        $dados                  = $request->only(['status','detalhes']);
        // $dados['data_entrega']  = $request->status == "ENTREGUE" ? now() : null;
        $dados['penalidade']    = $request->penalidade;
        $dados['tipo']          = $request->tipo;

        $ocorrencia->update($dados);

        return redirect()->route("ocorrencias.index")->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id){
        $ocorrencia = Ocorrencia::find($id);

        $ocorrencia->delete();

        return redirect()->route('ocorrencias.index');
    }
}
