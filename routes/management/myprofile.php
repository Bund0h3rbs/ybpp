<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'myprofile', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Profile', 'uses' => 'ProfileController@index']);

    Route::post('/create',  ['as' => 'klsconfig.create', 'uses' => 'ProfileController@create']);
    Route::post('/getlist', ['as' => 'klsconfig.getlist', 'uses' => 'ProfileController@getlist']);
    Route::post('/store',   ['as' => 'klsconfig.store', 'uses' => 'ProfileController@store']);
    Route::post('/delete',  ['as' => 'klsconfig.delete', 'uses' => 'ProfileController@delete']);
});
