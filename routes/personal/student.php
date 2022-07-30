<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'student', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Kesiswaan' ], function() {
    Route::get('/', ['as' => 'Student', 'uses' => 'StudentController@index']);

    Route::post('/getlist', ['as' => 'student.getlist', 'uses' => 'StudentController@getlist']);
    Route::post('/create',  ['as' => 'student.create', 'uses' => 'StudentController@create']);
    Route::post('/store',   ['as' => 'student.store', 'uses' => 'StudentController@store']);
    Route::post('/delete',  ['as' => 'student.delete', 'uses' => 'StudentController@delete']);

    Route::post('/filterdata',  ['as' => 'student.filterdata', 'uses' => 'StudentController@filterdata']);

});
