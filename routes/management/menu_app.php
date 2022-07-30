<?php

/* =================
| Default Route Menu
 =====================*/

Route::group(['prefix' => 'menu_app', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Management' ], function() {
    Route::get('/', ['as' => 'Menu Sistem', 'uses' => 'MenusController@index']);

    Route::post('/create',  ['as' => 'menus.create', 'uses' => 'MenusController@create']);
    Route::post('/getlist', ['as' => 'menus.getlist', 'uses' => 'MenusController@getlist']);
    Route::post('/store',   ['as' => 'menus.store', 'uses' => 'MenusController@store']);
    Route::post('/delete',  ['as' => 'menus.delete', 'uses' => 'MenusController@delete']);
    Route::post('/settingAkses',  ['as' => 'menus.settingAkses', 'uses' => 'MenusController@settingAkses']);
    Route::post('/storeakses',  ['as' => 'menus.storeakses', 'uses' => 'MenusController@storeakses']);
});
