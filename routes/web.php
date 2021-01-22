<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get("/", function () {
    return redirect()->route("login");
});

Route::get('/ato-de-infracao/{uuid}', 'Admin\OcorrenciasController@print')->name('ocorrencia.print');

Auth::routes(['login', 'logout']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/painel', 'PainelController@index')->name('painel.index');

    Route::resources([
        'pessoas'           => 'PessoasController',
        'blocos'            => 'BlocosController',
        'apartamentos'      => 'ApartamentosController',
        'garagens'          => 'GaragemController',
        'dependentes'       => 'DependentesController',
        'correspondencias'  => 'CorrespondenciasController',
        'ocorrencias'       => 'OcorrenciasController',
        'visitas'           => 'VisitasController',
        'pontos'            => 'PontoController',
        'usuarios'          => 'UsuariosController',
        'artigos'           => 'ArtigosController',
        'penalidades'       => 'PenalidadesController',
        'infracoes'         => 'InfracoesController',
    ]);

    Route::post('/ocorrencia/{id}/punir', 'OcorrenciasController@toPunish')->name('ocorrencia.punir');
    Route::get('/ocorrencia/{id}/denegar', 'OcorrenciasController@markAsDenied')->name('ocorrencia.denied');
    Route::get('/ocorrencia/{id}/revisar', 'OcorrenciasController@markAsInReview')->name('ocorrencia.inReview');

    Route::post('/upload/{id}', 'UploadController@store')->name('post.upload');
    Route::get('/upload/{id}', 'UploadController@index')->name('get.upload');
    Route::get('/upload/{id}/delete', 'UploadController@delete')->name('delete.upload');

    Route::get('pessoas/{id}/desvincular', 'PessoasController@desvincular')->name('pessoas.desvincular');
    Route::get('ajaxPessoas', 'PessoasController@getPessoas');
    Route::get('ajaxMoradores', 'PessoasController@getMoradores');

    Route::get('ajaxArtigos', 'ArtigosController@getArtigos');

    /**
     * Reports Routes
     */
    Route::get('relatorios/ocorrencias/individual', 'Reports\OcorrenciasReportController@getIndividual')->name('rpt.ocorrencia.individual');
    Route::post('relatorios/ocorrencias/individual', 'Reports\OcorrenciasReportController@postIndividual')->name('rpt.ocorrencia.individual');

    Route::get('relatorios/visitas/individual', 'Reports\VisitasReportController@getSearch')->name('rpt.visitas.index');
    Route::post('relatorios/visitas/individual', 'Reports\VisitasReportController@postSearch')->name('rpt.visitas.seach');

    Route::get('relatorios/correspondencias/individual', 'Reports\CorrespondenciasReportController@getSearch')->name('rpt.correspondencias.index');
    Route::post('relatorios/correspondencias/individual', 'Reports\CorrespondenciasReportController@postSearch')->name('rpt.correspondencias.search');
});
