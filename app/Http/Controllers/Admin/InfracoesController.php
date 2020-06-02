<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Infracao;

class InfracoesController extends Controller
{
    public function index()
    {
        $data = Infracao::latest()->get();
        return view('admin.infracoes.index', ['data' => $data]);
    }

    public function create()
    {
       return view('admin.infracoes.create-edit');
    }

    public function store(Request $request)
    {

        Infracao::create($request->all());

        return redirect()->route('infracoes.index')->with('msg','Registro Adicionado com Sucesso');
       
    }

    public function edit($id)
    {
        $infracao = Infracao::find($id);
        return view('admin.infracoes.create-edit',
            ['infracao'=>$infracao]
        );

    }

    public function update(Request $request,$id)
    {
        $infracao = Infracao::find($id);

        $infracao->update($request->all());
        
        return redirect()->route("infracoes.index")->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id){

        $infracao = Infracao::find($id);
        $infracao->delete();

        return redirect()->route("infracoes.index")->with('error','Você Removeu esse Registro!');
    }
}
