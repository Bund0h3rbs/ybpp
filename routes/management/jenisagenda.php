<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'jenisagenda', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Jenis Agenda', 'uses' => 'JenisAgendaController@index']);

    Route::post('/create',  ['as' => 'jnsagenda.create', 'uses' => 'JenisAgendaController@create']);
    Route::post('/getlist', ['as' => 'jnsagenda.getlist', 'uses' => 'JenisAgendaController@getlist']);
    Route::post('/store',   ['as' => 'jnsagenda.store', 'uses' => 'JenisAgendaController@store']);
    Route::post('/delete',  ['as' => 'jnsagenda.delete', 'uses' => 'JenisAgendaController@delete']);
});
