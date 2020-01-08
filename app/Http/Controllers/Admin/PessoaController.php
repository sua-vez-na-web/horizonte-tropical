<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pessoa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PessoaController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $data = Pessoa::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('pessoas.edit',$row->id).'" class="btn btn-primary btn-sm mx-1">Detalhes</a>';
                    $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pessoas.index');
    }

    public function create(){
        return view('admin.pessoas.create');
    }

    public function store(Request $request){
        $data = $request->all();

        $pessoa = Pessoa::create($data);

        return redirect()->route('pessoas.index');
    }

    public function edit($id){

        $pessoa = Pessoa::find($id);

        return view('admin.pessoas.edit',[ 'pessoa'=>$pessoa]);
    }

    public function update(Request $request,$id){
        $data = $request->all();

        $pessoa = Pessoa::find($id);

        if($pessoa){
            $pessoa->update($data);
            return redirect()->route('pessoas.index');
        }

        return redirect()->route('pessoas.index');
    }
}
