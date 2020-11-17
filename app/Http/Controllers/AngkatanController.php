<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use DataTables;

class AngkatanController extends Controller
{

	public function __construct()
	{
		$this->middleware('CheckLogin');
	}

	public function index(){

		$data = Http::get('http://localhost:8000/angkatan')->json();

        return view('pages.data.angkatan.angkatan', compact('data'));
	}

	public function show($id){

		$model = Http::get('http://localhost:8000/angkatan/'.$id.'')->json();
        return view('pages.data.angkatan.show', compact('model')); 

	}

	public function create(){

		$model = Http::get('http://localhost:8000/angkatan')->json();
        return view('pages.data.angkatan.form', compact('model')); 

	}

	public function store(Request $request){

		try {
            $this->validate($request, [
	            'nama_angkatan' => 'required|max:255',
	            'tahun' => 'required',
       		]);

	        $model = Http::post('http://localhost:8000/angkatan', [
	            'nama_angkatan' => $request->nama_angkatan,
	            'tahun' => $request->tahun
	        ]);

        	return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }

	}

	public function edit($id){

		$model = Http::get('http://localhost:8000/angkatan/'.$id.'')->json();
        return view('pages.data.angkatan.formEdit', compact('model')); 

	}

	public function update(Request $request, $id){

		try {
            $this->validate($request, [
	            'nama_angkatan' => 'required|max:255',
	            'tahun' => 'required',
       		]);

	        $model = Http::put('http://localhost:8000/angkatan/'.$id.'', [
	            'nama_angkatan' => $request->nama_angkatan,
	            'tahun' => $request->tahun
	        ]);

        	return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }

	}

	public function destroy($id){

		 Http::delete('http://localhost:8000/angkatan/'.$id.'')->json();

	}

	public function dataTable(){

        $model =  Http::get('http://localhost:8000/angkatan')->json();
        return DataTables::of($model)
        ->addColumn('tgl', function($data){
            return \Carbon\Carbon::parse($data['created_at'])->format('d/m/Y');
        })
        ->addColumn('aksi', function($model){
            return view('layouts._aksi', [
                'model' => $model,
                'url_show' => route('angkatan.show', $model['id']),
                'url_edit' => route('angkatan.edit', $model['id']),
                'url_destroy' => route('angkatan.destroy', $model['id'])
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['tgl', 'aksi'])
        ->make(true);
    }
}
