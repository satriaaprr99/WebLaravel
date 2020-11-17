<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DataTables;

class TagihanController extends Controller
{

	public function __construct()
	{
		$this->middleware('CheckLogin');
	}

	public function index(){

		$data = Http::get('http://localhost:8000/tagihan')->json();

		return view('pages.pembayaran.tagihan.datatagihan', $data);
	}

	public function dataTable(){

		$model = Http::get('http://localhost:8000/tagihan')->json();
		return DataTables::of($model)
		->addColumn('nominalFormat', function($data){
			return 'Rp. '.number_format($data['nominal']).'';
		})
		->addColumn('aksi', function($model){
			return view('layouts._aksi', [
				'model' => $model,
				'url_show' => route('tagihan.show', $model['id']),
				'url_edit' => route('tagihan.edit', $model['id']),
				'url_destroy' => route('tagihan.destroy', $model['id'])
			]);
		})
		->addIndexColumn()
		->rawColumns(['nominalFormat', 'aksi'])
		->make(true);
	}

	public function show($id){

		$model = Http::get('http://localhost:8000/tagihan/'.$id.'')->json();
		return view('pages.pembayaran.tagihan.show', compact('model')); 

	}

	public function create(){

		$model = Http::get('http://localhost:8000/tagihan')->json();
		return view('pages.pembayaran.tagihan.form', compact('model'));
	}

	public function store(Request $request){

		try {
            $this->validate($request, [
				'kd_tagihan' => 'required|unique:tagihan',
				'jenis_tagihan' => 'required',
				'tahun' => 'required',
				'nominal' => 'required|integer'
			]);

	        $model = Http::post('http://localhost:8000/tagihan', [
	            'kd_tagihan' => $request->kd_tagihan,
	            'jenis_tagihan' => $request->jenis_tagihan,
	            'bulan' => $request->bulan,
	            'tahun' => $request->tahun,
	            'nominal' => $request->nominal
	        ]);

        return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }
	}

	public function edit($id){

		$model = Http::get('http://localhost:8000/tagihan/'.$id.'')->json();
		return view('pages.pembayaran.tagihan.formEdit', compact('model')); 

	}

	public function update(Request $request, $id){

		try {
            $this->validate($request, [
				'kd_tagihan' => 'required',
				'jenis_tagihan' => 'required',
				'tahun' => 'required',
				'nominal' => 'required|integer'
			]);

	        $model = Http::put('http://localhost:8000/tagihan/'.$id.'', [
	            'kd_tagihan' => $request->kd_tagihan,
	            'jenis_tagihan' => $request->jenis_tagihan,
	            'bulan' => $request->bulan,
	            'tahun' => $request->tahun,
	            'nominal' => $request->nominal
	        ]);

        return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }

	}

	public function destroy($id){

		Http::delete('http://localhost:8000/tagihan/'.$id.'')->json();
	}

}
