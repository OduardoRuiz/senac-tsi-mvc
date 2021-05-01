<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

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
    return view('welcome');
});
Route::get('/avisos', function () {
    return view(
        'avisos',
        ['nome' => 'eduardo', 'mostrar' => true, 'avisos' => [
            ['id' => 1, 'texto' => 'Feriados agora'],
            ['id' => 2, 'texto' => 'Feriado Semana que vem']
        ]]
    );
});
Route::get('/ex1903', function () {
    return view('treinoparapi', ['onoff' => false]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'clientes'], function () {


    Route::get('/listar', [App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');
    Route::get('/listandoExercicio', [App\Http\Controllers\ClientesController::class, 'listandoExercicio'])->middleware('auth');
});

Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/clientes', App\Http\Controllers\ClientesController::class);
    });

    Route::group(['middleware' => ['auth']], function () {

        Route::resource('/users', App\Http\Controllers\UserController::class);
        Route::resource('/roles', App\Http\Controllers\RoleController::class);
    });
});
