<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Pessoa;
use App\Bloco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApartamentosController extends Controller
{
    public function index(Request $request)
    {
        // dd(Apartamento::with('proprietario', 'bloco')
        //     ->latest()
        //     ->get());
        // if ($request->ajax()) {
        //     $data = Apartamento::with('proprietario', 'bloco')
        //         ->latest()
        //         ->get();
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $btn = '<a href="' . route('apartamentos.edit', $row->id) . '" class="btn btn-primary btn-sm mx-1">Detalhes</a>';
        //             $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fa fa-trash"></i></a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        $data = Apartamento::with('proprietario', 'bloco')->get();
        return view('admin.apartamentos.index', ['data' => $data]);
    }

    public function create()
    {
        $proprietarios = Pessoa::where('tipo_cadastro', '=', 'PROPRIETARIO')->pluck('nome', 'id');
        $inquilinos = Pessoa::where('tipo_cadastro', '=', 'INQUILINO')->pluck('nome', 'id');
        $blocos  = Bloco::pluck('bloco', 'id');
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');
        return view('admin.apartamentos.create-edit', [
            'proprietarios' => $proprietarios,
            'inquilinos' => $inquilinos,
            'blocos' => $blocos,
            'apartamentos' => $apartamentos
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $apartamento = Apartamento::create($data);

        if ($apartamento) {
            return redirect()->route('apartamentos.index');
        }
        return redirect()->route('apartamentos.index');
    }

    public function edit($id)
    {
        $apartamento = Apartamento::find($id);
        $proprietarios = Pessoa::where('tipo_cadastro', '=', 'PROPRIETARIO')->pluck('nome', 'id');
        $inquilinos = Pessoa::where('tipo_cadastro', '=', 'INQUILINO')->pluck('nome', 'id');
        $blocos  = Bloco::pluck('bloco', 'id');
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('codigo', 'codigo');

        return view('admin.apartamentos.create-edit', [
            'apartamento' => $apartamento,
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,
            'proprietarios' => $proprietarios,
            'inquilinos' => $inquilinos,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $apartamento = Apartamento::find($id)->update($data);

        return redirect()->route('apartamentos.index');
    }
}
