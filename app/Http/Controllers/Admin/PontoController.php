<?php

namespace App\Http\Controllers\Admin;

use App\Ponto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class PontoController extends Controller
{
    public function index()
    {
        $pontos = Ponto::latest()->get();
        $funcionarios = User::where('cargo','FUNCIONARIO')->pluck('name','id');

        return view('admin.pontos.index',[
            'pontos'=>$pontos,
            'funcionarios'=>$funcionarios
        ]);
    }

    public function store(Request $request)
    {

        if($request->hasFile('arquivo')){

            $data = $request->all();
            $data['url'] = $request->arquivo->store('pontos');
        }

        Ponto::create($data);

        return redirect()->route('pontos.index');
    }

    public function show($id)
    {
        $ponto = Ponto::find($id);

        Storage::delete($ponto->url);

        $ponto->delete();

        return redirect()->route('pontos.index');
    }
}
