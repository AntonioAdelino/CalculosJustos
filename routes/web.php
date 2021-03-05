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

Route::get('/usuario', 'UsuarioController@index')->name('usuario.index');
Route::get('/usuario/create', 'UsuarioController@create')->name('usuario.create');
Route::post('/usuario/create', 'UsuarioController@store')->name('usuario.store');
Route::get('/usuario/{id}/edit', 'UsuarioController@edit')->name('usuario.edit');
Route::put('/usuario/{id}/edit', 'UsuarioController@update')->name('usuario.update');
Route::get('/usuario/{id}', 'UsuarioController@destroy')->name('usuario.destroy');

//Route::get('/usuario/{identificador}/edit' ['as' => 'UsuarioDetalhar', 'uses' => 'controllerUsuarios@detalhar']);