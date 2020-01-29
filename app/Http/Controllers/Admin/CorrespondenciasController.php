<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Correspondencia;


class CorrespondenciasController extends Controller
{
    public function index()
    {
        $data = Correspondencia::latest()->get();

        return view('admin.correspondencias.index', ['data' => $data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');
        $blocos = Bloco::orderBy('id')->pluck('codigo', 'id');

        // dd($blocos);

        return view('admin.correspondencias.create-edit', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $apartamento = Apartamento::where('bloco_id', $request->bloco)
            ->where('codigo', $request->apartamento)
            ->first();

        //dd($apartamento, $apartamento->proprietario->nome);
        if ($apartamento) {
            $apartamento->correspondencias()->create([
                'data_recebimento' => $request->data_recebimento
            ]);

            return redirect()->route('correspondencias.index');
        }

        return redirect()->back()->withInput();
    }
}
