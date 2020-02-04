<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartamento;

class PainelController extends Controller
{
    public function index()
    {
        return view('admin.painel.index', [
            'aptos_alugados'    => Apartamento::where('status',"OCUPADO")->count(),
            'aptos_disponiveis' => Apartamento::where('status',"DESOCUPADO")->count()
        ]);
    }
}
