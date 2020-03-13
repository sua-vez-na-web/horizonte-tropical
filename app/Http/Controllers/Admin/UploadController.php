<?php

namespace App\Http\Controllers\Admin;

use App\Foto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ocorrencia;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index($id)
    {
        $fotos = Ocorrencia::find($id)->fotos()->get();

        return view('admin.ocorrencias.upload',[
            'fotos' => $fotos,
            'id' => $id
        ]);
    }

    public function store(Request $request,$id)
    {
        $ocorrencia = Ocorrencia::find($id);
        if($request->hasFile('foto'))
        {
            $data = $request->all();
            $data['url'] = $request->foto->store('ocorrencias');
        }

        $ocorrencia->fotos()->create($data);

        return redirect()->route('get.upload',$id)->with('msg','Registro Adicionado com Sucesso!');
    }

    public function delete($id)
    {
        $foto = Foto::find($id);

        Storage::delete($foto->url);

        $foto->delete();

        return redirect()->route('get.upload',$foto->ocorrencia->id)
                    ->with('msg','Registro Excluído com Sucesso!');
    }
}
