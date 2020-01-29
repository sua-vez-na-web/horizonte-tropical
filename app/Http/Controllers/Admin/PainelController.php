<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bloco;

class PainelController extends Controller
{
    public function index()
    {

        $blocos = Bloco::with('apartamentos')->get();

        return view('admin.painel.index', ['blocos' => $blocos]);
    }
}
