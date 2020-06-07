<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get("/",function(){
    return redirect()->route("login");
});

Route::get('/ato-de-infracao/{uuid}','Admin\OcorrenciasController@print')->name('ocorrencia.print');

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

    Route::post('/ocorrencia/{id}/punir','OcorrenciasController@toPunish')->name('ocorrencia.punir');
    Route::get('/ocorrencia/{id}/denegar','OcorrenciasController@markAsDenied')->name('ocorrencia.denied');
    Route::get('/ocorrencia/{id}/revisar','OcorrenciasController@markAsInReview')->name('ocorrencia.inReview');

    Route::post('/upload/{id}','UploadController@store')->name('post.upload');
    Route::get('/upload/{id}','UploadController@index')->name('get.upload');
    Route::get('/upload/{id}/delete','UploadController@delete')->name('delete.upload');

    Route::get('pessoas/{id}/desvincular','PessoasController@desvincular')->name('pessoas.desvincular');
    Route::get('ajaxPessoas','PessoasController@getPessoas');
    Route::get('ajaxMoradores','PessoasController@getMoradores');

    Route::get('ajaxArtigos','ArtigosController@getArtigos');

});
