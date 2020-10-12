<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Angkatan;
use App\Tagihan;
use App\Pembayaran;
use Alert;

class AngkatanController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(){

   $data = [
     'angkatan' => Angkatan::orderBy('tahun', 'ASC')->paginate(10),
     'user' => User::find(auth()->user()->id),
   ];

   return view('angkatan.angkatan', $data);
 }

 public function tambah(Request $request){

   $angkatan = Angkatan::create($request->all());

   return back()->with('sukses', 'Data Berhasil Ditambahkan');
 }

  public function hapus($id){

    Angkatan::find($id)->delete();

    return back()->with('sukses', 'Data Berhasil Dihapus');

  }

  public function edit($id){

   $data = [
    'user' => User::find(auth()->user()->id),
    'angkatan' => Angkatan::find($id),
  ];

  return view('angkatan.editangkatan', $data);

  }

  public function update(Request $request, $id){

    $angkatan = \App\angkatan::find($id);
    $angkatan->update($request->all());

    return redirect('/angkatan')->with('sukses', 'Data Berhasil Diedit');
  }

}
