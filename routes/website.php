<?php

/* =================
| Default Route Website
 =====================*/


Route::get('/', 'App\Http\Controllers\Website\AwalController@index')->name('Yayasan');

// Route About group
Route::group(['prefix' => 'about', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'about', 'uses' => 'AboutController@index']);
    Route::get('/about_us', ['as' => 'about.about_us', 'uses' => 'AboutController@about_us']);
    Route::get('/struktur', ['as' => 'about.struktur', 'uses' => 'AboutController@struktur']);
    Route::get('/legalitas', ['as' => 'about.about_us', 'uses' => 'AboutController@legalitas']);

});

// Route news group
Route::group(['prefix' => 'news', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'news', 'uses' => 'NewController@index']);
    Route::get('/detail/{id}', ['as' => 'news.detail', 'uses' => 'NewController@detail']);
});

// Route news group
Route::group(['prefix' => 'program', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'program', 'uses' => 'ProgramController@index']);
    Route::get('/detail/{id}', ['as' => 'program.detail', 'uses' => 'ProgramController@detail']);
});

// Route news group
Route::group(['prefix' => 'contact', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'contact', 'uses' => 'ContactController@index']);
    Route::get('/detail/{id}', ['as' => 'contact.detail', 'uses' => 'ContactController@detail']);
});

