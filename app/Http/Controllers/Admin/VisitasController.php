<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use App\Visita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitasController extends Controller
{
    public function index()
    {
        $data = Visita::latest()->get();

        return view("admin.visitas.index",["data"=>$data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');
        $blocos = Bloco::orderBy('id')->pluck('codigo', 'id');


        return view('admin.visitas.create-edit', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['autorizado_por'] = $request->user()->id;
        $data['dh_entrada'] = now();

        Visita::create($data);

        return redirect()->route("visitas.index");
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

        return redirect()->route('visitas.index');
    }

    public function show($id)
    {
        $visita = Visita::find($id);

        $visita->delete();

        return redirect()->route('visitas.index');
    }
}

