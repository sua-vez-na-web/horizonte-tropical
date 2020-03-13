<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pessoa;
use App\Apartamento;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PessoasController extends Controller
{
    public function index(Request $request)
    {

        $data = Pessoa::latest()->get();

        return view('admin.pessoas.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.pessoas.create-edit');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $pessoa = Pessoa::create($data);

        return redirect()->route('pessoas.index');
    }

    public function edit($id)
    {

        $pessoa = Pessoa::find($id);
        $pessoas = Pessoa::whereNotIn('tipo_cadastro',[Pessoa::DEPENDENTE])->pluck('nome','id');
        return view('admin.pessoas.create-edit', ['pessoa' => $pessoa,'pessoas'=>$pessoas]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $pessoa = Pessoa::find($id);

        if ($pessoa) {
            $pessoa->update($data);
            return redirect()->route('pessoas.index');
        }

        return redirect()->route('pessoas.index');
    }

    public function getPessoas(Request $request){
        $pessoas = Pessoa::whereNotIn('tipo_cadastro',[Pessoa::DEPENDENTE])->get();
        return response()->json($pessoas);
    }

    public function getMoradores(Request $request){

        $pessoas = collect();
        $apto = Apartamento::where('bloco_id',$request->bloco)
                                ->where('apto',$request->apto)
                                ->first();

        $moradores = Pessoa::getMoradores($apto);
        $inquilino = $apto->inquilino;
        $proprietario = $apto->proprietario;

        if($inquilino){
            $pessoas->push($inquilino);
        }
        if($proprietario){
            $pessoas->push($proprietario);
        }
        if($moradores->count() > 0){
            foreach($moradores as $morador){
                $pessoas->push($morador);
            }
        }

        return response()->json([
            'moradores' => $pessoas,
        ],200);

    }


}
