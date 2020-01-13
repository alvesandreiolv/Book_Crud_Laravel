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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/livros/cadastrar', 'LivrosController@mostrarFormulario');

Route::post('/livros/cadastrar', 'LivrosController@cadastrar');

Route::get('/livros', 'LivrosController@ver');

Route::get('/livros/ver', 'LivrosController@ver');