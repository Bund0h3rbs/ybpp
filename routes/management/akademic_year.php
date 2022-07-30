<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'akademic_year', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Akademik Year', 'uses' => 'AkademicYearController@index']);

    Route::post('/create',  ['as' => 'akayear.create', 'uses' => 'AkademicYearController@create']);
    Route::post('/getlist', ['as' => 'akayear.getlist', 'uses' => 'AkademicYearController@getlist']);
    Route::post('/store',   ['as' => 'akayear.store', 'uses' => 'AkademicYearController@store']);
    Route::post('/delete',  ['as' => 'akayear.delete', 'uses' => 'AkademicYearController@delete']);
});
