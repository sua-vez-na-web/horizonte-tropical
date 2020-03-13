<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use App\Mail\EntradaCorrespondencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Correspondencia;
use Ramsey\Uuid\Uuid;
use Mail;


class CorrespondenciasController extends Controller
{
    public function index()
    {
        $data = Correspondencia::latest()->get();
        return view('admin.correspondencias.index', ['data' => $data]);
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');

        return view('admin.correspondencias.create-edit', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function store(Request $request)
    {
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apartamento_id)
            ->first();

        if ($apartamento) {

            $correspondencia = $apartamento->correspondencias()->create([
                'data_recebimento' => now(),
                'recebedor_id'     => $request->recebedor_id,
                'detalhes'         => $request->detalhes,
                'status'           => Correspondencia::STATUS_NAO_ENTREGUE,
                'tipo'             => $request->tipo
            ]);

            if($apartamento->inquilino){
                Mail::to($apartamento->inquilino->email)
                    ->cc('matthausnawan@gmail.com')
                    ->send(new EntradaCorrespondencia($correspondencia));
            }

            return redirect()->route('correspondencias.index');
        }

        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $correspondencia = Correspondencia::find($id);
        return view('admin.correspondencias.atualizar',
            ['correspondencia'=>$correspondencia]
        );

    }

    public function update(Request $request,$id)
    {

        $correspondencia = Correspondencia::find($id);

        $dados['status']        = Correspondencia::STATUS_ENTREGE;
        $dados['data_entrega']  = now();
        $dados['uuid']          = Uuid::uuid4();
        $correspondencia->update($dados);

        if($correspondencia->apartamento->inquilino){
            Mail::to($correspondencia->apartamento->inquilino->email)
                ->cc(null)
                ->send(new EntradaCorrespondencia($correspondencia));
        }
        return redirect()->route("correspondencias.index");
    }

    public function show($id){

        $correspondencia = Correspondencia::find($id);
        $correspondencia->delete();

        return redirect()->route("correspondencias.index");
    }
}
