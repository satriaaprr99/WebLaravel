<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Spp;
use App\Pembayaran;
use Alert;

class DashboardController extends Controller
{
    public function index(){
    	$data = [
            'user' => User::find(auth()->user()->id),
            'siswa' => Siswa::orderBy('nis', 'ASC')->paginate(10),
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ];

        return view('dashboard', $data);
    }
}
