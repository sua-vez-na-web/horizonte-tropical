<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get("/",function(){
    return redirect()->route("login");
});

Auth::routes(['login','logout']);

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

    Route::get('/ocorrencia/setStatus','OcorrenciasController@updateStatus')->name('ocorrencia.setStatus');

    Route::post('/upload/{id}','UploadController@store')->name('post.upload');
    Route::get('/upload/{id}','UploadController@index')->name('get.upload');
    Route::get('/upload/{id}/delete','UploadController@delete')->name('delete.upload');

    Route::get('pessoas/{id}/desvincular','PessoasController@desvincular')->name('pessoas.desvincular');
    Route::get('ajaxPessoas','PessoasController@getPessoas');
    Route::get('ajaxMoradores','PessoasController@getMoradores');

    Route::get('ajaxArtigos','ArtigosController@getArtigos');

});
