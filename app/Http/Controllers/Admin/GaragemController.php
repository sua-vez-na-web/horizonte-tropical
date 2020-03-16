<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Apartamento;
use App\Garagem;
use App\Bloco;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGaragemRequest as GaragemRequest;
use Storage;
class GaragemController extends Controller
{
    public function index(Request $request){

        $apto = Apartamento::find($request->apto_id);

        $garagens = $apto->garagens()->get();

        return view('admin.garagens.index',['data'=>$garagens]);
    }

    public function create(Request $request)
    {
        $apto         = Apartamento::find($request->apto_id);
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');
        return view('admin.garagens.create-edit',[
            'apto'=>$apto,
            'apartamentos'=> $apartamentos,
            'blocos' => $blocos
        ]);
    }

    public function edit($id)
    {
        $garagem      = Garagem::find($id);
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');


        return view('admin.garagens.create-edit',[
            'garagem' => $garagem,
            'apartamentos'=> $apartamentos,
            'blocos' => $blocos
        ]);
    }

    public function store(GaragemRequest $request){


        $data = $request->all();
        $apto = Apartamento::find($request->apto);

        if($request->origem == Garagem::ORIGEM_TERCEIROS){

            $apto_cedente = Apartamento::where('apto',$request->apto_id)
                                    ->where('bloco_id',$request->bloco_id)
                                    ->first();
            if(!$apto_cedente){
                return redirect()->back()->with('error','Apartamento não Localizado');
            }
            if(!$request->hasFile('upload')){
                return redirect()->back()->with('error','Para adiconar garagem de terceiros, envie a autorização');
            }

            $data['file'] = $request->upload->store('garagens');
            $data['apto_cedente'] = $apto_cedente->id;
        }

        //dd($data);
        $apto->garagens()->create($data);

       return redirect()->route('garagens.index',['apto_id'=>$apto])->with('msg','Registro Adicionado com Sucesso!');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $apto = Apartamento::find($request->apartamento_id);

        if($request->origem == Garagem::ORIGEM_TERCEIROS){

            $apto_cedente = Apartamento::where('apto',$request->apto_id)
                                    ->where('bloco_id',$request->bloco_id)
                                    ->first();
            if(!$apto_cedente){
                return redirect()->back()->with('error','Apartamento não Localizado');
            }
            if(!$request->hasFile('upload')){

                return redirect()->back()->with('error','Para adiconar garagem de terceiros, envie a autorização');
            }
            Storage::delete($apto->file);

            $data['file'] = $request->upload->store('garagens');
            $data['apto_cedente'] = $apto_cedente->id;
        }

        //dd($data);
        Garagem::find($id)->update($data);

       return redirect()->route('garagens.index',['apto_id'=>$apto->id])->with('msg','Registro Atualizado com Sucesso!');
    }

    public function show($id)
    {
        $garagem = Garagem::find($id);

        if($garagem->file){
            Storage::delete($garagem->file);
        }
        $garagem->delete();

        return redirect()->back()->with('error',"O Registro foi Deletado");
    }
}
