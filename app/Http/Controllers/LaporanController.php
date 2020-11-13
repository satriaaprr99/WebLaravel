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

		$pdf = PDF::loadView('pages.pembayaran.transaksi.pdf', $data);
		return $pdf->download('DataTransaksi_SMKN4BDG.pdf');

	}

	public function exportSiswaPdf($id){

		PDF::setPaper('A6', 'landskape');

		$model = Pembayaran::find($id);
      

		$pdf = PDF::loadView('pages.pembayaran.transaksi.pdfSiswa', compact('model'));
		return $pdf->download('StrukPembayaran.pdf');
		// return view('pages.pembayaran.transaksi.pdfSiswa', compact('model'));
	}
}
