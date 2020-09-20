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
    return view('layout_master.master');
});

Route::get('/dashboard', 'DashboardController@index');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('postlogin');

Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@postRegister')->name('postregister');

Route::get('/logout', 'AuthController@logout');

Route::get('/siswa', 'AdminController@index');
Route::post('/siswa', 'AdminController@tambah');
Route::get('/profile{id}','AdminController@edit');
Route::post('/profile{id}','AdminController@update');
Route::get('/hapus{id}', 'AdminController@hapus');

Route::get('/kelas', 'KelasController@index');
Route::post('/kelas', 'KelasController@tambah');

Route::get('/spp', 'SppController@index');
Route::post('/spp', 'SppController@tambah');

Route::get('/home', 'HomeController@index')->name('home');
