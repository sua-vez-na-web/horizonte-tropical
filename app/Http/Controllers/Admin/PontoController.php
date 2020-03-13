<?php

namespace App\Http\Controllers\Admin;

use App\Ponto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;
class PontoController extends Controller
{
    public function index()
    {
        if(Auth::user()->cargo == User::CARGO_SINDICO){
            $pontos = Ponto::latest()->get();
            $funcionarios = User::where('cargo',User::CARGO_PORTEIRO)->pluck('name','id');
        }else{
            $pontos = Ponto::where('usuario_id',Auth::user()->id)->get();
            $funcionarios = User::where('cargo',User::CARGO_PORTEIRO)->pluck('name','id');
        }

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
