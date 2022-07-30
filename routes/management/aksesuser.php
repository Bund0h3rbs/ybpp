<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'aksesuser', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Pengguna', 'uses' => 'AksesUserController@index']);

    Route::post('/create',  ['as' => 'aksesuser.create', 'uses' => 'AksesUserController@create']);
    Route::post('/getlist', ['as' => 'aksesuser.getlist', 'uses' => 'AksesUserController@getlist']);
    Route::post('/store',   ['as' => 'aksesuser.store', 'uses' => 'AksesUserController@store']);
    Route::post('/delete',  ['as' => 'aksesuser.delete', 'uses' => 'AksesUserController@delete']);
    Route::post('/resetpassword',  ['as' => 'aksesuser.resetpassword', 'uses' => 'AksesUserController@resetpassword']);

});
