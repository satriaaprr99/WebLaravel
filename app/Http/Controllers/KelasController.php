<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Spp;
use App\Pembayaran;
use Alert;

class KelasController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(){

	    $data = [
	      'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->paginate(10),
	      'user' => User::find(auth()->user()->id),
	  ];

	  return view('kelas.datakelas', $data);
	}

	public function tambah(Request $request){

       $Kelas = Kelas::create($request->all());

       dd($Kelas);

        return back();
    }

    public function hapus($id){

       Kelas::find($id)->delete();

       return back();
    }

}
