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

Route::get('/', function () {
    return view('welcome');
});

Route::get('alunos', 'AlunosController@index');
Route::get('alunos/create', 'AlunosController@create');
Route::post('alunos', 'AlunosController@store');
Route::get('alunos/{aluno}/edit', 'AlunosController@edit')->name('edit');
Route::put('alunos/update/{aluno}', 'AlunosController@update')->name('atualizar');
Route::delete('alunos/{aluno}', 'AlunosController@destroy')->name('delete');
