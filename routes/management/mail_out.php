<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'mail_out', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Surat Keluar', 'uses' => 'MailOutController@index']);

    Route::post('/create',  ['as' => 'mail_out.create', 'uses' => 'MailOutController@create']);
    Route::post('/getlist', ['as' => 'mail_out.getlist', 'uses' => 'MailOutController@getlist']);
    Route::post('/store',   ['as' => 'mail_out.store', 'uses' => 'MailOutController@store']);
    Route::post('/delete',  ['as' => 'mail_out.delete', 'uses' => 'MailOutController@delete']);
});
