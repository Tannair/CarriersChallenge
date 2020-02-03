<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('allFuncs', 'FuncionariosController@getFuncionarios');
Route::post('saveFunc', 'FuncionariosController@store');
Route::put('editFunc', 'FuncionariosController@edit');
Route::delete('deleteFunc', 'FuncionariosController@delete');

Route::get('oneFunc/{id}', 'FuncionariosController@getFuncionario');
Route::get('relatorio/{endpoint}', 'FuncionariosController@relatorio');

