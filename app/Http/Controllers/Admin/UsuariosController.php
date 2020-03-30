<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest as UserRequest;

class UsuariosController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();

        return view('admin.usuarios.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.usuarios.create-edit');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('usuarios.index')->with('msg','Registro Adicionado com Sucesso!');
    }

    public function edit($id)
    {

        $usuario = User::find($id);

        return view('admin.usuarios.create-edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $data = $request->all();
        $data['password'] = $request->has('password') ? bcrypt($request->password): $usuario->password;

        if ($usuario) {
            $usuario->update($data);
            return redirect()->route('usuarios.index')->with('msg','Registro Atualizado com Sucesso');
        }

        return redirect()->route('usuarios.index')->with('error','Não Foi Possivel Atualizar o Registro entre em Contato com Desenvolvedor!');
    }

    public function show($id)
    {
        $usuario = User::find($id);

        if($usuario){
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('error','Usuário foi Removido');
        }

        return redirect()->route('usuario.index')->with('error','Ocorreu um erro no procedimento');
    }
}
