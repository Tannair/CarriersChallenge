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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', 'LoginController@showFormLogin')->name('logar');

Route::post('/login', 'LoginController@login')->name('login');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('funcionarios', 'FuncionariosController@index')->name('funcionarios');

    Route::get('/logout', 'HomeController@logout')->name('logout');


});
