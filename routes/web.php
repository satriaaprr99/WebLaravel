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
    return view('auth.login');
});
Route::get('/dashboard', 'DashboardController@index');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('postlogin');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@postRegister')->name('postregister');
Route::get('/logout', 'AuthController@logout');

Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa', 'SiswaController@tambah');
Route::get('/profile{id}','SiswaController@edit');
Route::post('/profile{id}','SiswaController@update');
Route::get('/hapus{id}', 'SiswaController@hapus');
Route::post('/siswa/{id}/transaksi', 'SiswaController@transaksi');

Route::get('/kelas', 'KelasController@index');
Route::post('/kelas', 'KelasController@tambah');
Route::get('/editkelas{id}','KelasController@edit');
Route::post('/editkelas{id}','KelasController@update');

Route::get('/angkatan', 'AngkatanController@index');
Route::post('/angkatan', 'AngkatanController@tambah');
Route::get('/editangkatan{id}','AngkatanController@edit');
Route::post('/editangkatan{id}','AngkatanController@update');

Route::get('/tagihan', 'TagihanController@index');
Route::post('/tagihan', 'TagihanController@tambah');
Route::get('/edittagihan{id}','TagihanController@edit');
Route::post('/edittagihan{id}','TagihanController@update');

Route::get('/transaksi', 'TransaksiController@index');
Route::post('/transaksi', 'TransaksiController@tambah');
Route::get('/edittransaksi{id}','TransaksiController@edit');
Route::post('/edittransaksi{id}','TransaksiController@update');
Route::get('/transaksihapus{id}', 'TransaksiController@hapus');
Route::get('/histori', 'TransaksiController@histori');

Route::get('/siswa/exportexcel', 'LaporanController@exportExcel');
Route::get('/transaksi/exportpdf', 'LaporanController@exportPdf');
