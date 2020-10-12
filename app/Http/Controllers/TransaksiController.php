<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Tagihan;
use App\Pembayaran;
use Alert;
use PDF;

class TransaksiController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request){

		$data = [
			'pembayaran' => Pembayaran::all(),
			'siswa' => Siswa::all(),
			'tagihan' => Tagihan::all(),
			'user' => User::find(auth()->user()->id),

		];

		return view('transaksi.transaksi', $data);

	}

	public function histori(){

		$data = [
			'pembayaran' => Pembayaran::orderBy('created_at', 'DESC')->paginate(100),
			'siswa' => Siswa::all(),
			'tagihan' => Tagihan::all(),
			'user' => User::find(auth()->user()->id),
		];

		return view('transaksi.histori', $data);
	}

	public function tambah(Request $request){

		if(Siswa::where('nis',$request->nis)->exists() == false):
			return back()->with('error', 'NIS Tidak ada di Data Siswa!');
		exit;
		endif;

		$siswa = Siswa::where('nis',$request->nis)->get();

		foreach($siswa as $val){
			$id_siswa = $val->id;
		}

		$siswa = Pembayaran::create([
			'kd_bayar' => mt_rand(00000000, 99999999),
			'siswa_id' => $id_siswa,
			'tagihan_id' => $request->tagihan,
			'bayar' => $request->bayar,
		]);

		return back()->with('sukses', 'Data Berhasil Ditambahkan');
	}

	public function hapus($id){

		Pembayaran::find($id)->delete();

		return back()->with('sukses', 'Data Berhasil Dihapus');

	}

	public function edit($id){	

		$data = [
			'user' => User::find(auth()->user()->id),
			'siswa' => Siswa::all(),
			'tagihan' => Tagihan::all(),
			'pembayaran' => Pembayaran::find($id),
		];

		return view('transaksi.edittransaksi', $data);

	}

	public function update(Request $request, $id){

		$pembayaran = Pembayaran::find($id);

		$pembayaran->update([
			'tagihan_id' => $request->tagihan,
			'bayar' => $request->bayar,
		]);

		if(Siswa::where('nis',$request->nis)->exists() == false):
			return back()->with('error', 'NIS siswa tidak ada di data');
		exit;
		endif;

		if($request->nis != $pembayaran->siswa->nis) :
			$siswa = Siswa::where('nis',$request->nis)->get();

			foreach($siswa as $val){
				$id_siswa = $val->id;
			}

			$pembayaran->update([
				'siswa_id' => $id_siswa,
			]);
		endif;

		return back()->with('sukses', 'Data Berhasil Diedit');
	}
}
