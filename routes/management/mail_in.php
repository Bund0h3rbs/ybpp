<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'mail_in', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Surat Keluar', 'uses' => 'MailInController@index']);

    Route::post('/create',  ['as' => 'mail_in.create', 'uses' => 'MailInController@create']);
    Route::post('/getlist', ['as' => 'mail_in.getlist', 'uses' => 'MailInController@getlist']);
    Route::post('/store',   ['as' => 'mail_in.store', 'uses' => 'MailInController@store']);
    Route::post('/delete',  ['as' => 'mail_in.delete', 'uses' => 'MailInController@delete']);
});
