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
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/perfil', 'UserController@perfil')->name('perfil' );
Route::get('/edit-password', 'UserController@editPassword')->name('edit.password' );
Route::put('/user-password-update', 'UserController@passwordUpdate')->name('user.password.update' );

Route::resource('user', 'UserController');
Route::resource('alunos', 'AlunosController');
Route::resource('matriculas', 'MatriculasController');

Route::get('/mensalidades', 'MensalidadesController@index')->name('mensalidades.index');
Route::get('/mensalidades/show/{mensalidade}', 'MensalidadesController@show')->name('mensalidades.show');
Route::get('/mensalidades/{mensalidade}/edit', 'MensalidadesController@edit')->name('mensalidades.edit');
Route::put('/mensalidades/{mensalidade}/cancela', 'MensalidadesController@cancela')->name('mensalidades.cancela');
Route::put('/mensalidades/{mensalidade}/reativa', 'MensalidadesController@reativa')->name('mensalidades.reativa');
Route::put('/mensalidades/{mensalidade}/baixa', 'MensalidadesController@baixa')->name('mensalidades.baixa');
Route::put('/mensalidades/baixa/{mensalidade}/store', 'MensalidadesController@storeBaixa')->name('mensalidades.baixa.store');
