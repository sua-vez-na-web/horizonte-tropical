<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;
use App\Infracao;
use App\Penalidade;

class ArtigosController extends Controller
{
    public function index()
    {
        $data = Artigo::latest()->get();
        return view('admin.artigos.index', ['data' => $data]);
    }

    public function create()
    {
        $infracoes   = Infracao::pluck('descricao', 'id');
        $penalidades = Penalidade::pluck('descricao', 'id');
       
        return view('admin.artigos.create-edit', 
            [
                'infracoes' => $infracoes, 
                'penalidades' => $penalidades
            ]
        );
    }

    public function store(Request $request)
    {

       
        Artigo::create($request->all());

        return redirect()->route('artigos.index')->with('msg','Registro Adicionado com Sucesso');
       
    }

    public function edit($id)
    {
        $artigo = Artigo::find($id);
        $infracoes   = Infracao::pluck('descricao', 'id');
        $penalidades = Penalidade::pluck('descricao', 'id');

        return view('admin.artigos.create-edit',
            [
                'artigo'=>$artigo,
                'infracoes' => $infracoes, 
                'penalidades' => $penalidades
            ]
        );

    }

    public function update(Request $request,$id)
    {
        $artigo = Artigo::find($id);

        $artigo->update($request->all());
        
        return redirect()->route("artigos.index")->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id){

        $artigo = Artigo::find($id);
        $artigo->delete();

        return redirect()->route("artigos.index")->with('error','Você Removeu esse Registro!');
    }

    public function getArtigos(Request $request)
    {

        $artigos = Artigo::where('infracao_id',$request->infracao_id)->get();

        return response()->json([
            'artigos' => $artigos,
        ],200);

    }
}
