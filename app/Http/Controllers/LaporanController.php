<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

use App\User;
use App\Siswa;
use App\Kelas;
use App\Angkatan;
use App\Tagihan;
use App\Pembayaran;
use PDF;

class LaporanController extends Controller
{
	public function exportExcel(){
		return Excel::download(new SiswaExport, 'DataSiswa_SMKN4BDG.xlsx');
	}

	public function exportPdf(){

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

		$data = [
			'pembayaran' => Pembayaran::all(),
			'siswa' => Siswa::all(),
			'tagihan' => Tagihan::all(),
			'user' => User::find(auth()->user()->id),
			'bayar' => Pembayaran::all()->sum('bayar'),
		];

		$pdf = PDF::loadView('transaksi.pdf', $data);
		return $pdf->download('DataTransaksiPembayaranSPP_SMKN4BDG.pdf');

	}
}
