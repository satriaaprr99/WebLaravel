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

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = Http::get('http://localhost:8000/siswa')->json();

        return view('pages.data.siswa.datasiswa', $data);

    }

    public function show($id){

        $model = Http::get('http://localhost:8000/siswa/'.$id.'')->json();
        return view('pages.data.siswa.show',compact('model'));
    }

    public function create(){

        $model = Http::get('http://localhost:8000/siswa')->json();
        $model2 = Http::get('http://localhost:8000/kelas')->json();
        $model3 = Http::get('http://localhost:8000/angkatan')->json();

        return view('pages.data.siswa.form', compact('model', 'model2', 'model3'));

    }

    public function store(Request $request){

        try {

            $this->validate($request, [
                'nis' => 'required|min:10|max:11|unique:siswa',
                'nama' => 'required|string|max:255',
                'id_kelas' => 'required',
                'id_angkatan' => 'required',
                'nohp' => 'required|max:20',
                'alamat' => 'required'
            ]);

            $model = Http::post('http://localhost:8000/siswa', [
                'avatar' => $request->file('avatar'),
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->input('id_kelas'),
                'id_angkatan' => $request->input('id_angkatan'),
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
            ]);

            return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {

            echo $e;

        }
    }

    public function profile($id){

        $model = Http::get('http://localhost:8000/siswa/'.$id.'')->json();
        $model2 = Http::get('http://localhost:8000/kelas')->json();
        $model3 = Http::get('http://localhost:8000/angkatan')->json();
        $model4 = Http::get('http://localhost:8000/siswabayar/'.$id.'')->json();

        return view('pages.data.siswa.detailsiswa',compact('model', 'model2', 'model3', 'model4'));
    }

    public function edit($id){

        $model = Http::get('http://localhost:8000/siswa/'.$id.'')->json();
        $model2 = Http::get('http://localhost:8000/kelas')->json();
        $model3 = Http::get('http://localhost:8000/angkatan')->json();

        return view('pages.data.siswa.formEdit', compact('model', 'model2', 'model3')); 

    }

    public function update(Request $request, $id){

         try {

            $this->validate($request, [
                'nis' => 'required|min:10|max:11',
                'nama' => 'required|string|max:255',
                'id_kelas' => 'required',
                'id_angkatan' => 'required',
                'nohp' => 'required|max:20',
                'alamat' => 'required'
            ]);

            $model = Http::put('http://localhost:8000/siswa/'.$id.'', [
                'avatar' => $request->file('avatar'),
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->input('id_kelas'),
                'id_angkatan' => $request->input('id_angkatan'),
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
            ]);

            return response($model)->header('Content-Type', 'application/json');

        } catch (Exception $e) {

            echo $e;

        }

    }

    public function destroy($id){   
        $model = Siswa::where('id',$id)->delete();
        $model = Pembayaran::where('siswa_id',$id)->delete();
    }

    public function dataTable(){

        $model = Http::get('http://localhost:8000/siswa')->json();


        return DataTables::of($model)
            ->addColumn('profile', function($model){
                if ($model['avatar'] == true) {
                    return '<a href='.'profile'.$model['id'].'><span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" style="width: 40px; height: 40px;" src='.'http://localhost:8000/uploads/'.$model['avatar'].'></span></a>';
                } else {
                    return '<a href='.'profile'.$model['id'].'><span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" style="width: 40px; height: 40px;" src="http://localhost:8000/uploads/default.png"></span></a>';
                }
                
            })
            ->addColumn('aksi', function($model){
                return view('layouts._aksi', [
                    'model' => $model,
                    'url_show' => route('siswa.show', $model['id']),
                    'url_edit' => route('siswa.edit', $model['id']),
                    'url_destroy' => route('siswa.destroy', $model['id'])
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['profile','aksi'])
            ->make(true);
    }

    public function dataTableProfile($id){

        $data = Http::get('http://localhost:8000/siswabayar/'.$id.'')->json();

        return DataTables::of($data)
            ->addColumn('lunas', function($data){
                if ($data['nominal'] - $data['bayar'] == 0) {
                    return '<b class="text-green">Lunas</b>';
                } else {
                    return '<b class="text-red">Belum Lunas</b>';
                };
            })
            ->addColumn('sisa', function($data){
                return 'Rp. '.number_format($data['nominal']-$data['bayar']).'';
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
            ->addIndexColumn()
            ->rawColumns(['lunas', 'sisa', 'nominalFormat', 'bayarFormat', 'aksi'])
            ->make(true);
    }

}   
