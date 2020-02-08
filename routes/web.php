<?php

Route::get("/",function(){
    return redirect()->route("login");
});

Auth::routes(['login','logout']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/painel', 'PainelController@index')->name('painel.index');

    Route::resources([
        'pessoas'      => 'PessoasController',
        'blocos'       => 'BlocosController',
        'apartamentos' => 'ApartamentosController',
        'dependentes' =>  'DependentesController',
        'correspondencias' => 'CorrespondenciasController',
        'ocorrencias' => 'OcorrenciasController',
        'visitas' => 'VisitasController',
    ]);

    Route::post('/upload/{id}','UploadController@store')->name('post.upload');
    Route::get('/upload/{id}','UploadController@index')->name('get.upload');
    Route::get('/upload/{id}/delete','UploadController@delete')->name('delete.upload');
});
