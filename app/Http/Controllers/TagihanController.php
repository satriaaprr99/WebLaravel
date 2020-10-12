<?php

namespace App\Http\Controllers;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Tagihan;
use App\Pembayaran;
use Alert;

use Illuminate\Http\Request;

class TagihanController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){

		$data = [
			'tagihan' => Tagihan::all(),
			'user' => User::find(auth()->user()->id),
		];

		return view('tagihan.datatagihan', $data);
	}

	public function tambah(Request $request){

		$Tagihan = Tagihan::create($request->all());

		return back()->with('sukses', 'Data Berhasil Ditambah');
	}

	public function edit($id){

		$data = [
			'user' => User::find(auth()->user()->id),
			'tagihan' => Tagihan::find($id),
		];

		return view('tagihan.edittagihan', $data);

	}

	public function update(Request $request, $id){

		$Tagihan = \App\Tagihan::find($id);
		$Tagihan->update($request->all());

		return redirect('/tagihan')->with('sukses', 'Data Berhasil Diedit');
          // return redirect('/siswa')->with('sukses', 'Data Berhasil Diedit');
	}

	public function hapus($id){

		$delete = \App\Tagihan::find($id);
		$status = $delete->delete();

		return redirect('/tagihan')->with('sukses', 'Data Berhasil Dihapus');
	}

}
