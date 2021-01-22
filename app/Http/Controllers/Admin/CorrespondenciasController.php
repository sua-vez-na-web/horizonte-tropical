<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Bloco;
use App\Mail\EntradaCorrespondencia;
use App\Mail\SaidaCorrespondencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Correspondencia;
use Mail;
use App\Http\Requests\StoreCorrespondenciaRequest as CorrespondenciaRequest;
use Yajra\DataTables\Facades\DataTables;

class CorrespondenciasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Correspondencia::with(['apartamento', 'recebedor'])->select(sprintf('%s.*', (new Correspondencia)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $register = $row;
                return view('admin.correspondencias.partials.dataTableActions', compact('register'));
            });

            $table->addColumn('apto_name', function ($row) {
                return $row->apartamento ? $row->apartamento->apto : '';
            });

            $table->addColumn('bloco_name', function ($row) {
                return $row->apartamento ? $row->apartamento->bloco_id : '';
            });

            $table->addColumn('recebedor_name', function ($row) {
                return $row->recebedor ? $row->recebedor->nome : "";
            });

            $table->addColumn('tipo', function ($row) {
                return $row->tipo ?  $row->getType() : "--";
            });

            $table->addColumn('status_name', function ($row) {
                return $row->status ?  $row->getStatus() : "--";
            });

            $table->rawColumns(['placeholder', 'recebedor', 'status', 'tipo']);

            return $table->make(true);
        }

        return view("admin.correspondencias.index");
    }

    public function create()
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos = Bloco::orderBy('id')->pluck('codigo', 'id');

        return view('admin.correspondencias.create-edit', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function store(CorrespondenciaRequest $request)
    {
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apartamento_id)
            ->first();

        if ($apartamento) {
            $correspondencia = $apartamento->correspondencias()->create([
                'data_recebimento' => now(),
                'recebedor_id' => $request->recebedor_id,
                'detalhes' => $request->detalhes,
                'status' => Correspondencia::STATUS_NAO_ENTREGUE,
                'tipo' => $request->tipo
            ]);

            if ($apartamento->inquilino) {
                Mail::to($apartamento->inquilino->email)
                    ->send(new EntradaCorrespondencia($correspondencia));
            }

            if ($apartamento->proprietario) {
                Mail::to($apartamento->proprietario->email)
                    ->send(new EntradaCorrespondencia($correspondencia));
            }

            return redirect()->route('correspondencias.index')->with('msg', 'Registro Adicionado com Sucesso');
        }

        return redirect()->back()->with('error', 'Ocorreu um erro na Operação');
    }

    public function edit($id)
    {
        $correspondencia = Correspondencia::find($id);
        return view(
            'admin.correspondencias.atualizar',
            ['correspondencia' => $correspondencia]
        );
    }

    public function update(Request $request, $id)
    {
        $correspondencia = Correspondencia::find($id);

        $dados['status'] = Correspondencia::STATUS_ENTREGE;
        $dados['data_entrega'] = now();
        $dados['uuid'] = time() . '-' . $correspondencia->tipo . '/' . $correspondencia->id;
        $correspondencia->update($dados);

        if ($correspondencia->apartamento->inquilino) {
            Mail::to($correspondencia->apartamento->inquilino->email)
                ->send(new SaidaCorrespondencia($correspondencia));
        }
        if ($correspondencia->apartamento->proprietario) {
            Mail::to($correspondencia->apartamento->proprietario->email)
                ->send(new SaidaCorrespondencia($correspondencia));
        }
        return redirect()->route("correspondencias.index")->with('msg', 'Registro Atualizado com Sucesso!');
    }

    public function show($id)
    {
        $correspondencia = Correspondencia::find($id);
        $correspondencia->delete();

        return redirect()->route("correspondencias.index")->with('error', 'Você Removeu esse Registro!');
    }
}
