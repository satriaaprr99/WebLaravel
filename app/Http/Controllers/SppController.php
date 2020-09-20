<?php

namespace App\Http\Controllers;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Spp;
use App\Pembayaran;
use Alert;

use Illuminate\Http\Request;

class SppController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

	    $data = [
	      'spp' => Spp::orderBy('tahun', 'ASC')->paginate(10),
	      'user' => User::find(auth()->user()->id),
	  ];

	  return view('spp.dataspp', $data);
	}

	public function tambah(Request $request){

       $Spp = Spp::create($request->all());

        return back();
    }

    public function hapus($id){

       $delete = \App\Siswa::find($id);
       $status = $delete->delete();

       return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }

}
