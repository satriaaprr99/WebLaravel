<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){

    	if($request->has('cari')){
    		$Siswa = \App\Siswa::where('nama', 'LIKE','%'.$request->cari.'%')->get();
    	}else if($request->has('cari')){
            $Siswa = \App\Siswa::where('nis', 'LIKE','%'.$request->cari.'%')->get();
    	}else{
    		$Siswa = \App\Siswa::all()->sortBy('nis');
    	}
    	return view('datasiswa', ['Siswa' => $Siswa]);
    }

    public function tambah(Request $request){

    	\App\Siswa::create($request->all());
    	return redirect('/datasiswa')->with('sukses', 'Data Berhasil Ditambah');

    }

    public function edit($id){
    	$Siswa = \App\Siswa::find($id);
    	return view('/editdatasiswa', ['Siswa' => $Siswa]);
    	
    }

    public function update(Request $request, $id){
    	$Siswa = \App\Siswa::find($id);
    	$Siswa->update($request->all());
    	return redirect('/datasiswa')->with('sukses', 'Data Berhasil Diedit');
    }

    public function hapus(Request $request, $id){

    	$delete = \App\Siswa::find($id);
    	$status = $delete->delete();
    	return redirect('/datasiswa')->with('sukses', 'Data Berhasil Dihapus');
    }
}
