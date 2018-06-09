<?php

Route::get('/teste', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function() {
   
    Route::get('/', function() { 
       return view('admin.index'); 
    });
   
    Route::resource('carros', 'CarroController');
    Route::resource('oficinas', 'OficinaController');
    Route::resource('marcas', 'MarcasController');
    Route::resource('propostas', 'PropostaController');

    Route::get('oficinasmarcas/{id}', 'OficinaController@marcas')
        ->name('oficinas.marcas');

    Route::get('/carros/destaque/{id}', 'CarroController@destaque')
        ->name('carros.destaque');

    Route::get('carrosgraf', 'CarroController@graf')
        ->name('carros.graf');
    
    Route::get('propostas', 'CarroController@propostas')
        ->name('propostas');

    Route::get('resposta/{id}', 'PropostaController@respostaMail')
        ->name('resposta');

    Route::get('propostasgraf', 'PropostaController@graf')
        ->name('propostas.graf');

    Route::post('enviarEmail', 'PropostaController@enviarEmail')
        ->name('enviarEmail');
});


Route::group(['namespace' => 'Site'], function() {
    Route::get('carrossite', 'CarroController@index')
        ->name('carrossite.index');

    Route::get('/', 'CarroController@viewdestaque')
        ->name('carrossite.viewdestaque');

    Route::any('/pesquisa', 'CarroController@pesquisar')
        ->name('pesquisa');

    Route::get('/proposta/{id}', 'CarroController@propostaIndex')
        ->name('proposta');

    Route::resource('propostas', 'PropostaController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/promocao', 'EmailControler@enviaEmail');

Route::get('/carros/{id?}', 'Admin\CarroController@ws');
