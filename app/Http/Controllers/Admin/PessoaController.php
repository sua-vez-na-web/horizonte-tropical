<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pessoa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PessoaController extends Controller
{
    public function index(Request $request)
    {

        $data = Pessoa::latest()->get();
        // dd($data);
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

        return view('admin.pessoas.create-edit', ['pessoa' => $pessoa]);
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
}
