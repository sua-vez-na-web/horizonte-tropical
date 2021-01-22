<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Apartamento;
use App\Bloco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportOcorrenciaIndividualRequest as OcorrenciaReportRequest;
use App\Ocorrencia;
use App\Penalidade;

class OcorrenciasReportController extends Controller
{
    public function getIndividual(Request $request)
    {
        $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
        $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');
        $penalidades  = Penalidade::orderBy('id')->pluck('descricao', 'id');

        return view('reports.ocorrencias.individual', [
            'apartamentos' => $apartamentos,
            'blocos' => $blocos,
            'penalidades' => $penalidades,
            'result'    => false
        ]);
    }

    public function postIndividual(Request $request)
    {
        $apartamento = Apartamento::where('bloco_id', $request->bloco_id)
            ->where('apto', $request->apto_id)
            ->first();

        if ($apartamento) {

            //query do database
            $result = Ocorrencia::where('apartamento_id', $apartamento->id)
                ->whereBetween('data', [$request->dt_inicio, $request->dt_final])
                ->orderBy('data', 'asc')
                ->get();

            $apartamentos = Apartamento::orderBy('id')->take(16)->pluck('apto', 'apto');
            $blocos       = Bloco::orderBy('id')->pluck('codigo', 'id');
            $penalidades  = Penalidade::orderBy('id')->pluck('descricao', 'id');

            return view('reports.ocorrencias.individual', [
                'apartamentos' => $apartamentos,
                'blocos' => $blocos,
                'penalidades' => $penalidades,
                'result'    => true,
                'data'      => $result
            ]);
        }

        return redirect()->back()->with('error', 'As informações recebidas não foram satisfatórias');
    }
}
