<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use App\Visita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreVisitaRequest as VisitaRequest;
use App\Http\Requests\StoreVisitaRequest;

class VisitasController extends Controller
{
    public function index()
    {
        $data = Visita::latest()->get();
        return view("admin.visitas.index",["data"=>$data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');


        return view('admin.visitas.create-edit', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,

        ]);
    }

    public function store(StoreVisitaRequest $request)
    {

        $data = $request->all();

        //Combina Visitantes em um unico array
        $visitantes[] = array();
        foreach($request->visitante as $key => $value){
            $visitantes[$key]['nome']      = $request->visitante[$key];
            $visitantes[$key]['tipo']      = $request->doc_tipo[$key];
            $visitantes[$key]['documento'] = $request->documento[$key];
        }

        if($request->has(['bloco_id','apartamento_id'])){
            $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
                ->where('apto', $request->apartamento_id)
                ->first();

            //Build data
            foreach($visitantes as $visita){
                $data['autorizado_por'] = Auth::user()->id;
                $data['dh_entrada'] = now();
                $data['tecnica'] = 0;
                $data['nome_visitante'] = $visita['nome'];
                $data['rg_visitante']   = $visita['tipo']." | ".$visita['documento'];

                $apartamento->visitas()->create($data);
            }
            return redirect()->route("visitas.index")->with('msg','Registro Adicionado com Sucesso!');
        }

        foreach($visitantes as $visita){

            $data['autorizado_por'] = Auth::user()->id;
            $data['dh_entrada'] = now();
            $data['apartamento_id'] = 0;
            $data['empresa'] = $request->empresa;
            $data['tecnica'] = 1;
            $data['nome_visitante'] = $visita['nome'];
            $data['rg_visitante']   = $visita['tipo']." : ".$visita['documento'];

            Visita::create($data);
        }

        return redirect()->route("visitas.index")->with('msg','Registro Adicionado com Sucesso!');

    }

    public function edit($id)
    {
        $visita = Visita::find($id);

        return view ('admin.visitas.atualizar',['visita'=>$visita]);
    }

    public function update(Request $request,$id)
    {
        $visita = Visita::find($id);

        $visita->update([
            'dh_saida' => now()
        ]);

        return redirect()->route('visitas.index')->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id)
    {
        $visita = Visita::find($id);

        $visita->delete();

        return redirect()->route('visitas.index');
    }
}

