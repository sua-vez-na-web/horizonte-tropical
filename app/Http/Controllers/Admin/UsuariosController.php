<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('usuarios.index');
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
            return redirect()->route('usuarios.index');
        }

        return redirect()->route('usuarios.index');
    }
}
