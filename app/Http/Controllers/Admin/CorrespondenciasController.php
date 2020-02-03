<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Correspondencia;


class CorrespondenciasController extends Controller
{
    public function index()
    {
        $data = Correspondencia::latest()->get();
        return view('admin.correspondencias.index', ['data' => $data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');
        $blocos = Bloco::orderBy('id')->pluck('codigo', 'id');

        return view('admin.correspondencias.create-edit', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function store(Request $request)
    {

        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('codigo', $request->apartamento_id)
            ->first();


        if ($apartamento) {
            $apartamento->correspondencias()->create([
                'data_recebimento' => $request->data_recebimento,
                'detalhes'         => $request->detalhes,
                'status'           => $request->status
            ]);

            return redirect()->route('correspondencias.index');
        }

        return redirect()->back()->withInput();
    }

    public function edit($id){

        $correspondencia = Correspondencia::find($id);
        return view('admin.correspondencias.atualizar', ['correspondencia'=>$correspondencia]);

    }

    public function update(Request $request,$id){

        $correspondencia = Correspondencia::find($id);

        $dados = $request->only(['status','detalhes']);
        $dados['data_entrega']  = $request->status == "ENTREGUE" ? now() : null;
        $correspondencia->update($dados);

        return redirect()->route("correspondencias.index");
    }
}
