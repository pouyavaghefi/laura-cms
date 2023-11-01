<?php

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
use Modules\MemeGenerator\Http\Controllers\MemeGeneratorController;

Route::group(['prefix' => 'admin', 'as' => 'adm.'], function () {
    Route::prefix('memegenerator')->name('memeg.')->group(function () {
        Route::resource('/', \Modules\MemeGenerator\Http\Controllers\MemeGeneratorController::class);
    });
});
