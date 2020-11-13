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

//ROUTE DASHBOARD
Route::get('/', function () {
    return view('auth.login');
});
Route::get('dashboard', 'DashboardController@index');

//ROUTE LOGIN
Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@postLogin')->name('postlogin');
Route::get('register', 'AuthController@register')->name('register');
Route::post('register', 'AuthController@postRegister')->name('postregister');
Route::get('logout', 'AuthController@logout');

//ROUTES SISWA
Route::resource('siswa', 'SiswaController');
Route::get('profile{id}','SiswaController@profile');
Route::post('profile{id}','SiswaController@updateProfile');
Route::get('tablesiswa', 'SiswaController@dataTable')->name('siswa.table');
Route::get('tablesiswaprofile{id}', 'SiswaController@dataTableProfile')->name('siswa.tableprofile');

//ROUTES KELAS
Route::resource('kelas', 'KelasController');
Route::get('tablekelas', 'KelasController@dataTable')->name('kelas.table');

//ROUTES ANGKATAN
Route::resource('angkatan', 'AngkatanController');
Route::get('tableangkatan', 'AngkatanController@dataTable')->name('angkatan.table');

//ROUTES TAGIHAN
Route::resource('tagihan', 'TagihanController');
Route::get('tabletagihan', 'TagihanController@dataTable')->name('tagihan.table');

//ROUTES TRANSAKSI
Route::resource('transaksi', 'TransaksiController');
Route::get('histori', 'TransaksiController@histori');
Route::get('siswa/{id}/transaksi', 'TransaksiController@transaksi')->name('transaksi.siswa');
Route::post('siswa/{id}/transaksi/create', 'TransaksiController@createTransaksi')->name('createTransaksi.siswa');
Route::get('tabletransaksi', 'TransaksiController@dataTable')->name('transaksi.table');

//ROUTE EXPORT
Route::get('export/excel/siswa', 'LaporanController@exportExcel')->name('export.excel');
Route::get('export/pdf/transaksi', 'LaporanController@exportPdf')->name('export.pdf');
Route::get('export/pdf/siswa/{id}', 'LaporanController@exportSiswaPdf')->name('cetakTransaksi.siswa');

//ROUTE API PUBLIC
Route::get('corona', 'ApiController@index');	
Route::get('berita', 'ApiController@berita');

Route::get('lumenapi', 'SiswaController@lumenapi');