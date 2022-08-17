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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => '\App\Http\Controllers'], function () {

    Route::group([
        'prefix' => 'hospitals',
        'as' => 'hospital.',
        'controller' => 'HospitalController'
    ], function () {

        Route::get('/', 'index')->name('index');
        Route::get('/{hospital}', 'show')->name('show');
        Route::get('/{hospital}/edit', 'edit')->name('edit');
        Route::match(['put', 'patch'], '/{hospital}/edit', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
    });

    Route::group([
        'prefix' => 'patients',
        'as' => 'patient.',
        'controller' => 'PatientController'
    ], function () {

        Route::get('/', 'index')->name('index');
        Route::get('/{patient}', 'show')->name('show');
        Route::get('/{patient}/edit', 'edit')->name('edit');
        Route::match(['put', 'patch'], '/{patient}/edit', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
    });
    
});