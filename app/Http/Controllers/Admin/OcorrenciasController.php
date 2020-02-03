<?php

namespace App\Http\Controllers\Admin;

use App\Infracao;
use Illuminate\Http\Request;
use App\Ocorrencia;
use App\Apartamento;
use App\Bloco;
use App\Http\Controllers\Controller;

class OcorrenciasController extends Controller
{
    public function index()
    {
        $data = Ocorrencia::latest()->get();
        return view('admin.ocorrencias.index', ['data' => $data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');
        $blocos = Bloco::orderBy('id')->pluck('codigo', 'id');
        $infracoes = Infracao::pluck("descricao","id");

        return view('admin.ocorrencias.create-edit', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,
            'infracoes' => $infracoes
        ]);
    }

    public function store(Request $request)
    {

        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('codigo', $request->apartamento_id)
            ->first();


        if ($apartamento) {
            $apartamento->ocorrencias()->create([
                'data'          => $request->data,
                'infracao_id'   => $request->infracao_id,
                'penalidade'    => $request->penalidade,
                'tipo'          => $request->tipo,
                'status'        => $request->status
            ]);

            return redirect()->route('ocorrencias.index');
        }

        return redirect()->back()->withInput();
    }

    public function edit($id){

        $ocorrencia = Ocorrencia::find($id);
        return view('admin.ocorrencias.atualizar', ['ocorrencia'=>$ocorrencia]);

    }

    public function update(Request $request,$id){

        $ocorrencia = Ocorrencia::find($id);

        $dados                  = $request->only(['status','detalhes']);
        $dados['data_entrega']  = $request->status == "ENTREGUE" ? now() : null;
        $dados['penalidade']    = $request->penalidade;
        $dados['tipo']          = $request->tipo;

        $ocorrencia->update($dados);

        return redirect()->route("ocorrencias.index");
    }
}
