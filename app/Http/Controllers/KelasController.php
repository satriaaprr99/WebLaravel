<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use DataTables;

class KelasController extends Controller
{

	public function __construct(){
       $this->middleware('CheckLogin');
    }

    public function index(Request $request){

        $data = Http::get('http://localhost:8000/kelas')->json();

        return view('pages.data.kelas.datakelas', compact('data'));
    }

    public function show($id){

        $model = Http::get('http://localhost:8000/kelas/'.$id.'')->json();
        return view('pages.data.kelas.show', compact('model'));

    }

    public function create(){

        $model = Http::get('http://localhost:8000/kelas')->json();
        return view('pages.data.kelas.form', compact('model'));

    }
    public function store(Request $request){

        try {

            $this->validate($request, [
                'nama_kelas' => 'required',
                'kompetensi_keahlian' => 'required',
            ]);

            $model = Http::post('http://localhost:8000/kelas', [
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian
            ]);

            return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }
    
    }

    public function edit($id){

        $model = Http::get('http://localhost:8000/kelas/'.$id.'')->json();
        return view('pages.data.kelas.formEdit',$model, compact('model')); 
    }

    public function update(Request $request, $id){

        try {
            $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            ]);

        $model = Http::put('http://localhost:8000/kelas/'.$id.'', [
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {
            echo $e;
        }

    }
    public function destroy($id){

        $data = Http::delete('http://localhost:8000/kelas/'.$id.'')->json();

    }

    public function dataTable(){

        $model = Http::get('http://localhost:8000/kelas')->json();
        return DataTables::of($model)
        ->addColumn('tgl', function($data){
            return \Carbon\Carbon::parse($data['created_at'])->format('d/m/Y');
        })
        ->addColumn('aksi', function($model){
            return view('layouts._aksi', [
                'model' => $model,
                'url_show' => route('kelas.show', $model['id']),
                'url_edit' => route('kelas.edit', $model['id']),
                'url_destroy' => route('kelas.destroy', $model['id'])
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['tgl', 'aksi'])
        ->make(true);
    }


}
