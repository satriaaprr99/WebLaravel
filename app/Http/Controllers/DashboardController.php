<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Tagihan;
use App\Pembayaran;
use Alert;

class DashboardController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$data = [
			'user' => User::find(auth()->user()->id),
			'siswa' => Siswa::all(),
			'kelas' => Kelas::all(),
			'tagihan' => Tagihan::all()->sum('nominal'),
			'ctagihan' => Tagihan::all(),
			'cbayar' => Pembayaran::all(),
			'bayar' => Pembayaran::all()->sum('bayar'),
			'pembayaran' => Pembayaran::orderBy('updated_at', 'DESC')->paginate(5),
		];

		$model = Http::get('http://localhost:8000/histori')->json();
		return view('pages.dashboard.dashboard', $data, compact('model'));
	}
}
