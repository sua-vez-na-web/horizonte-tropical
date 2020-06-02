<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penalidade;

class PenalidadesController extends Controller
{
    public function index()
    {
        $data = Penalidade::latest()->get();
        return view('admin.penalidades.index', ['data' => $data]);
    }

    public function create()
    {
       return view('admin.penalidades.create-edit');
    }

    public function store(Request $request)
    {

        Penalidade::create($request->all());

        return redirect()->route('penalidades.index')->with('msg','Registro Adicionado com Sucesso');
       
    }

    public function edit($id)
    {
        $penalidade = Penalidade::find($id);
        return view('admin.penalidades.create-edit',
            ['penalidade'=>$penalidade]
        );

    }

    public function update(Request $request,$id)
    {
        $penalidade = Penalidade::find($id);

        $penalidade->update($request->all());
        
        return redirect()->route("penalidades.index")->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id){

        $penalidade = Penalidade::find($id);
        $penalidade->delete();

        return redirect()->route("penalidades.index")->with('error','Você Removeu esse Registro!');
    }
}
