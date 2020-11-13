<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Angkatan;
use App\Tagihan;
use App\Pembayaran;
use DataTables;
use PDF;

class TransaksiController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Request $request){

		$data = Http::get('http://localhost:8000/transaksi')->json();

		return view('pages.pembayaran.transaksi.transaksi', $data);

	}

	public function histori(){

		$model = Http::get('http://localhost:8000/histori')->json();

		return view('pages.pembayaran.transaksi.histori', compact('model'));
	}

	public function show($id){

		$model = Http::get('http://localhost:8000/transaksi/'.$id.'')->json();
		
        return view('pages.pembayaran.transaksi.show', compact('model'));
	}

	public function dataTable(){

		$model = Http::get('http://localhost:8000/transaksi')->json();
		return DataTables::of($model)
		->addColumn('lunas', function($data){
			if ($data['nominal'] - $data['bayar'] == 0) {
            	return '<b class="text-green">Lunas</b>';
	        } else {
	            return '<b class="text-red">Belum Lunas</b>';
	        };
		})
		->addColumn('nominalFormat', function($data){
			return 'Rp. '.number_format($data['nominal']).'';
		})
		->addColumn('bayarFormat', function($data){
			return 'Rp. '.number_format($data['bayar']).'';
		})
		->addColumn('aksi', function($model){
			return view('layouts._aksi', [
				'model' => $model,
				'url_show' => route('transaksi.show', $model['id']),
				'url_edit' => route('transaksi.edit', $model['id']),
				'url_destroy' => route('transaksi.destroy', $model['id'])
			]);
		})
		->addColumn('cetak', function($data){
			return '<a href="export/pdf/siswa/'.$data['id'] .'" class="btn btn-sm btn-default">
					<i class="ni ni-single-copy-04"></i></a>';
		})
		->addIndexColumn()
		->rawColumns(['nominalFormat','bayarFormat','lunas','tgl','aksi', 'cetak'])
		->make(true);
	}

	public function create(){

		$model = Http::get('http://localhost:8000/transaksi')->json();
		$model2 = Http::get('http://localhost:8000/tagihan')->json();

		return view('pages.pembayaran.transaksi.form', compact('model', 'model2')); 
	}

	public function store(Request $request){

		try {
			
			$this->validate($request, [
	            'siswa_id' => 'required',
	            'tagihan_id' => 'required',
	            'tgl_bayar' => 'required',
	            'bayar' => 'required|integer'
	        ]);

			 $model = Http::post('http://localhost:8000/transaksi', [
	            'kd_bayar' => mt_rand(00000000, 99999999),
				'siswa_id' => $request->siswa_id,
				'tagihan_id' => $request->tagihan_id,
				'tgl_bayar' => $request->tgl_bayar,
				'bayar' => $request->bayar,
	        ]);

	        return response($model)->header('Content-Type', 'application/json');

		} catch (Exception $e) {
			echo $e;
		}
		
	}

	public function edit($id){	

		$model = Http::get('http://localhost:8000/transaksi/'.$id.'')->json();
		$model2 = Http::get('http://localhost:8000/tagihan')->json();

		return view('pages.pembayaran.transaksi.formEdit', compact('model', 'model2')); 

	}

	public function update(Request $request, $id){

		try {
			
			$this->validate($request, [
	            'siswa_id' => 'required',
	            'tagihan_id' => 'required',
	            'bayar' => 'required|integer'
	        ]);

			$model = Http::put('http://localhost:8000/transaksi/'.$id.'', [
					'siswa_id' => $request->siswa_id,
					'tagihan_id' => $request->tagihan_id,
					'bayar' => $request->bayar,
	       	]);

	        return response($model)->header('Content-Type', 'application/json');

		} catch (Exception $e) {
			echo $e;
		}
		
	}

	public function destroy($id){

		$model = Http::delete('http://localhost:8000/transaksi/'.$id.'')->json();

	}

	public function transaksi($id){

        $model = Siswa::findOrFail($id);
        $data = [
            'user' => User::find(auth()->user()->id),
            'siswa' => Siswa::find($id),
            'kelas' => Kelas::all(),
            'angkatan' => Angkatan::all(),
            'tagihan' => Tagihan::all(),
            'bayar' => Pembayaran::find($id)
        ];
        
        return view('pages.data.siswa.formTransaksi', $data, compact('model'));
    }

    public function createTransaksi(Request $request, $id){
        $data = Siswa::find($id);
        if($data->tagihan()->where('tagihan_id', $request->tagihan)->exists()){
            return back()->with('error', 'Data Tagihan sudah ada di tabel siswa');
        }else{
        	$data->tagihan()->attach($request->tagihan, [
	            'kd_bayar' => mt_rand(00000000, 99999999), 
	            'bayar' => $request->bayar
       		]);
        }
    } 
}

