<?php

namespace App\Http\Controllers\Admin;

use App\Correspondencia;
use App\Visita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartamento;

class PainelController extends Controller
{
    public function index()
    {

        return view('admin.painel.index', [
            'aptos_alugados'    => Apartamento::where('status',Apartamento::APTO_STATUS_OCUPADO)->count(),
            'aptos_disponiveis' => Apartamento::where('status',Apartamento::APTO_STATUS_DESOCUPADO)->count(),
            'visitas'           => Visita::where('dh_saida',null)->count(),
            'correspondencias'  => Correspondencia::where('data_entrega',null)->count()
        ]);
    }
}
