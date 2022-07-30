<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'webhome', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Webconfig' ], function() {
    Route::get('/', ['as' => 'Tentang Kami', 'uses' => 'WebHomeController@index']);

    Route::post('/create',  ['as' => 'webhome.create', 'uses' => 'WebHomeController@create']);
    Route::post('/getlist', ['as' => 'webhome.getlist', 'uses' => 'WebHomeController@getlist']);
    Route::post('/store',   ['as' => 'webhome.store', 'uses' => 'WebHomeController@store']);
    Route::post('/delete',  ['as' => 'webhome.delete', 'uses' => 'WebHomeController@delete']);
});
