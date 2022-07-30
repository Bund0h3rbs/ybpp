<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'jnsberita', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Jenis Berita', 'uses' => 'JenisBeritaController@index']);

    Route::post('/create',  ['as' => 'jnsberita.create', 'uses' => 'JenisBeritaController@create']);
    Route::post('/getlist', ['as' => 'jnsberita.getlist', 'uses' => 'JenisBeritaController@getlist']);
    Route::post('/store',   ['as' => 'jnsberita.store', 'uses' => 'JenisBeritaController@store']);
    Route::post('/delete',  ['as' => 'jnsberita.delete', 'uses' => 'JenisBeritaController@delete']);
});
