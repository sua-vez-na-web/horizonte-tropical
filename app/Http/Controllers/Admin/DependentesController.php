<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dependente;
use App\Pessoa;
use Illuminate\Http\Request;



class DependentesController extends Controller
{
    public function index(Request $request)
    {
        $pessoa = Pessoa::find($request->pessoa_id);
        $data = $pessoa->dependentes()->get();

        return view('admin.dependentes.index', ['data' => $data, 'pessoa' => $pessoa]);
    }

    public function create()
    {
        return view('admin.dependentes.create-edit');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['pessoa_id'] = $request->pessoa_id;

        $dependente = Dependente::create($data);

        return redirect()->route('dependentes.index', ['pessoa_id' => $dependente->pessoa_id]);
    }

    public function edit($id)
    {

        $dependente = Dependente::find($id);

        return view('admin.dependentes.create-edit', ['dependente' => $dependente]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $dependente = Dependente::find($id);

        if ($dependente) {
            $dependente->update($data);
            return redirect()->route('dependentes.index', ['pessoa_id' => $dependente->pessoa_id]);
        }

        return redirect()->route('dependentes.index', ['pessoa_id' => $dependente->pessoa_id]);
    }
}
