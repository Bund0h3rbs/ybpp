<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'webabout', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Webconfig' ], function() {
    Route::get('/', ['as' => 'ABOUT', 'uses' => 'WebAboutController@index']);

    Route::post('/create',  ['as' => 'webabout.create', 'uses' => 'WebAboutController@create']);
    Route::post('/getlist', ['as' => 'webabout.getlist', 'uses' => 'WebAboutController@getlist']);
    Route::post('/store',   ['as' => 'webabout.store', 'uses' => 'WebAboutController@store']);
    Route::post('/delete',  ['as' => 'webabout.delete', 'uses' => 'WebAboutController@delete']);
});
