<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'anggota', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Keanggotaan' ], function() {
    Route::get('/', ['as' => 'Anggota', 'uses' => 'AnggotaController@index']);

    Route::post('/getlist', ['as' => 'anggota.getlist', 'uses' => 'AnggotaController@getlist']);
    Route::post('/create',  ['as' => 'anggota.create', 'uses' => 'AnggotaController@create']);
    Route::post('/store',   ['as' => 'anggota.store', 'uses' => 'AnggotaController@store']);
    Route::post('/delete',  ['as' => 'anggota.delete', 'uses' => 'AnggotaController@delete']);

    Route::post('/filterdata',  ['as' => 'anggota.filterdata', 'uses' => 'AnggotaController@filterdata']);

});
