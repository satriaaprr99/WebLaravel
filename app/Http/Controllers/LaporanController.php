<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use PDF;

class LaporanController extends Controller
{
	public function exportExcel(){
		return Excel::download(new SiswaExport, 'DataSiswa_SMKN4BDG.xlsx');
	}

	public function exportPdf(){

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		
		$bayar = Http::get('http://localhost:8000/dashboard')->json();
		$model = Http::get('http://localhost:8000/transaksi')->json();

		$pdf = PDF::loadView('pages.pembayaran.transaksi.pdf', compact('bayar', 'model'));
		return $pdf->download('DataTransaksi_SMKN4BDG.pdf');

	}

	public function exportSiswaPdf($id){

		PDF::setPaper('A6', 'landskape');

		$model = Http::get('http://localhost:8000/transaksi/'.$id.'')->json();
      

		$pdf = PDF::loadView('pages.pembayaran.transaksi.pdfSiswa', compact('model'));
		return $pdf->download('StrukPembayaran.pdf');
		//return view('pages.pembayaran.transaksi.pdfSiswa', compact('model'));
	}
}
