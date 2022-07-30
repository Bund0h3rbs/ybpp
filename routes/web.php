<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



if(Request::is(['home','home/*'])){

    Route::get('/home', function () {
        return view('template.default');
    })->middleware(['auth'])->name('Home');

}else{

    require __DIR__.'/website.php';

}

require __DIR__.'/default.php';
require __DIR__.'/auth.php';
