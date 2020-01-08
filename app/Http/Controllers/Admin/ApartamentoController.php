<?php

namespace App\Http\Controllers\Admin;

use App\Apartamento;
use App\Pessoa;
use App\Bloco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApartamentoController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Apartamento::with('proprietario','bloco')
                ->latest()
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('apartamentos.edit',$row->id).'" class="btn btn-primary btn-sm mx-1">Detalhes</a>';
                    $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.apartamentos.index');
    }

    public function create(){
        $pessoas = Pessoa::where('tipo_cadastro','=','PROPRIETARIO')->pluck('nome','id');
        $blocos  = Bloco::pluck('bloco','id');
        return view('admin.apartamentos.create',['pessoas'=>$pessoas,'blocos'=>$blocos]);
    }

    public function store(Request $request){
        $data = $request->all();

        $apartamento = Apartamento::create($data);

        if($apartamento){
            return redirect()->route('apartamentos.index');
        }
        return redirect()->route('apartamentos.index');
    }
}
