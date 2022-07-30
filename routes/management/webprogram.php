<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'webprogram', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Webconfig' ], function() {
    Route::get('/', ['as' => 'PROGRAM', 'uses' => 'WebProgramController@index']);

    Route::post('/create',  ['as' => 'webprogram.create', 'uses' => 'WebProgramController@create']);
    Route::post('/getlist', ['as' => 'webprogram.getlist', 'uses' => 'WebProgramController@getlist']);
    Route::post('/store',   ['as' => 'webprogram.store', 'uses' => 'WebProgramController@store']);
    Route::post('/delete',  ['as' => 'webprogram.delete', 'uses' => 'WebProgramController@delete']);
});
