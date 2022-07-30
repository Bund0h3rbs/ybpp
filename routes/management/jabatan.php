<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'jabatan', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Pengaturan Kelas', 'uses' => 'JabatanController@index']);

    Route::post('/create',  ['as' => 'jbtn.create', 'uses' => 'JabatanController@create']);
    Route::post('/getlist', ['as' => 'jbtn.getlist', 'uses' => 'JabatanController@getlist']);
    Route::post('/store',   ['as' => 'jbtn.store', 'uses' => 'JabatanController@store']);
    Route::post('/delete',  ['as' => 'jbtn.delete', 'uses' => 'JabatanController@delete']);
});
