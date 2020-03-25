<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use App\Visita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Http\Requests\StoreVisitaRequest as VisitaRequest;
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

    public function store(VisitaRequest $request)
    {

        $data = $request->all();

        if($request->has(['bloco_id','apartamento_id'])){
            $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
                ->where('apto', $request->apartamento_id)
                ->first();

            $data['autorizado_por'] = Auth::user()->id;
            $data['dh_entrada'] = now();
            $data['tecnica'] = 0;

            $apartamento->visitas()->create($data);

            return redirect()->route("visitas.index")->with('msg','Registro Adicionado com Sucesso!');
        }

        $data['autorizado_por'] = Auth::user()->id;
        $data['dh_entrada'] = now();
        $data['apartamento_id'] = 0;
        $data['empresa'] = $request->empresa;
        $data['tecnica'] = 1;

        Visita::create($data);
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

