<?php

Route::group(['prefix'=>'admin'],function(){
    Route::resources([
        'pessoas'      => 'Admin\PessoaController',
        'blocos'       => 'Admin\BlocoController',
        'apartamentos' => 'Admin\ApartamentoController'
    ]);
});
