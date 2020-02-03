<?php


Auth::routes(['login','logout']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'auth'], function () {

    Route::get('/painel', 'PainelController@index')->name('painel.index');

    Route::resources([
        'pessoas'      => 'PessoaController',
        'blocos'       => 'BlocoController',
        'apartamentos' => 'ApartamentoController',
        'dependentes' =>  'DependentesController',
        'correspondencias' => 'CorrespondenciasController',
        'ocorrencias' => 'OcorrenciasController',
    ]);
});
