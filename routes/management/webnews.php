<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'webnews', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Webconfig' ], function() {
    Route::get('/', ['as' => 'BERITA', 'uses' => 'WebNewsController@index']);

    Route::post('/create',  ['as' => 'webnews.create', 'uses' => 'WebNewsController@create']);
    Route::post('/getlist', ['as' => 'webnews.getlist', 'uses' => 'WebNewsController@getlist']);
    Route::post('/store',   ['as' => 'webnews.store', 'uses' => 'WebNewsController@store']);
    Route::post('/delete',  ['as' => 'webnews.delete', 'uses' => 'WebNewsController@delete']);
});
