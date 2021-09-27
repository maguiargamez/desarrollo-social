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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('home');

    //Módulo de usuarios
    Route::put('cuentas-usuario/update-password/{id}', 'App\Http\Controllers\CuentasUsuarioController@updatePassword')->name('cuentas-usuario.update-password');
    Route::get('cuentas-usuario/contrasenia/{id}', 'App\Http\Controllers\CuentasUsuarioController@cambiarContrasenia')->name('cuentas-usuario.cambiar-contrasenia');
    Route::get('cuentas-usuario/get-all', 'App\Http\Controllers\CuentasUsuarioController@getAll')->name('cuentas-usuario.get-all');
    Route::resource('cuentas-usuario', 'App\Http\Controllers\CuentasUsuarioController',['except'=>'']);

});

Route::view('home', 'home')->middleware('auth');
