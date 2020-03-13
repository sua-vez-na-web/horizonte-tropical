<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Pessoa;
use App\Bloco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApartamentosController extends Controller
{
    public function index(Request $request)
    {

        $data = Apartamento::with('proprietario', 'bloco')->get();
        return view('admin.apartamentos.index', ['data' => $data]);
    }

    public function create()
    {
        $proprietarios = Pessoa::whereIn('tipo_cadastro',[
                Pessoa::PROPRIETARIO_NAO_RESIDENTE,
                Pessoa::PROPRIETARIO_RESIDENTE
            ])->pluck('nome', 'id');

        $inquilinos     = Pessoa::where('tipo_cadastro', Pessoa::INQUILINO)->pluck('nome', 'id');
        $blocos         = Bloco::pluck('bloco', 'id');
        $apartamentos   = Apartamento::orderBy('id')->take(16)->pluck('aptp', 'apto');

        return view('admin.apartamentos.create-edit', [
            'proprietarios' => $proprietarios,
            'inquilinos'    => $inquilinos,
            'blocos'        => $blocos,
            'apartamentos'  => $apartamentos
        ]);
    }

    public function show($id)
    {
        $apartamento = Apartamento::find($id);

        return view('admin.apartamentos.detalhes',[
            'apartamento'       => $apartamento,
            'visitas'           => $apartamento->visitas()->get(),
            'correspondencias'  => $apartamento->correspondencias()->get(),
            'ocorrencias'       => $apartamento->ocorrencias()->get(),
            'moradores'         => \App\Pessoa::getMoradores($apartamento)
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();


        $apartamento = Apartamento::create($data);

        if ($apartamento) {
            return redirect()->route('apartamentos.index');
        }
        return redirect()->route('apartamentos.index');
    }

    public function edit($id)
    {
        $apartamento = Apartamento::find($id);

        $proprietarios = Pessoa::whereIn('tipo_cadastro',[
                Pessoa::PROPRIETARIO_NAO_RESIDENTE,
                Pessoa::PROPRIETARIO_RESIDENTE
            ])->pluck('nome', 'id');

        $inquilinos     = Pessoa::where('tipo_cadastro', Pessoa::INQUILINO)->pluck('nome', 'id');
        $blocos         = Bloco::pluck('bloco', 'id');
        $apartamentos   = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');

        return view('admin.apartamentos.create-edit', [
            'apartamento'   => $apartamento,
            'apartamentos'  => $apartamentos,
            'blocos'        => $blocos,
            'proprietarios' => $proprietarios,
            'inquilinos'    => $inquilinos,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $apartamento = Apartamento::find($id)->update($data);

        return redirect()->route('apartamentos.index');
    }
}
