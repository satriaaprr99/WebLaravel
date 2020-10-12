<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Tagihan;
use App\Pembayaran;
use Alert;

class KelasController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request){

      $data = [
       'kelas' => Kelas::all(),
       'user' => User::find(auth()->user()->id),
      ];

      return view('kelas.datakelas', $data);
 }

   public function tambah(Request $request){

     $Kelas = Kelas::create($request->all());

     return back()->with('sukses', 'Data Berhasil Ditambahkan');
   }

   public function hapus($id){

    Kelas::find($id)->delete();

    return back()->with('sukses', 'Data Berhasil Dihapus');

  }

  public function edit($id){

   $data = [
    'user' => User::find(auth()->user()->id),
    'kelas' => Kelas::find($id),
  ];

  return view('kelas.editkelas', $data);

  }

  public function update(Request $request, $id){

    $Kelas = \App\Kelas::find($id);
    $Kelas->update($request->all());

    return redirect('/kelas')->with('sukses', 'Data Berhasil Diedit');

  }

}
