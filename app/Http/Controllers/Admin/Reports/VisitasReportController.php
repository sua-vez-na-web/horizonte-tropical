<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Apartamento;
use App\Bloco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportVisitasRequest;
use App\Visita;
use Illuminate\Support\Facades\DB;

class VisitasReportController extends Controller
{
    public function getSearch(Request $request)
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');

        return view('reports.visitas.index', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,
            'result'    => false
        ]);
    }

    public function postSearch(Request $request)
    {
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apto_id)
            ->first();

        if ($apartamento) {

            //query do database
            $result = Visita::where('apartamento_id', $apartamento->id)
                ->whereBetween('created_at', [$request->dt_inicio, $request->dt_final])
                // ->orderBy('data', 'asc')
                ->get();

            $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
            $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');

            return view('reports.visitas.index', [
                'apartamentos' => $apartamentos,
                'blocos' => $blocos,
                'result'    => true,
                'data'      => $result
            ]);
        } else {
            $result = Visita::whereBetween('created_at', [$request->dt_inicio, $request->dt_final])
                // ->orderBy('data', 'asc')
                ->get();

            $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
            $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');

            return view('reports.visitas.index', [
                'apartamentos' => $apartamentos,
                'blocos' => $blocos,
                'result'    => true,
                'data'      => $result
            ]);
        }

        return redirect()->back()->with('error', 'As informações recebidas não foram satisfatórias');
    }
}
