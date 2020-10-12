<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Angkatan;
use App\Tagihan;
use App\Pembayaran;
use Alert;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){


        $data = [
            'siswa' => Siswa::all(),
            'user' => User::find(auth()->user()->id),
            'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->paginate(100),
            'angkatan' => Angkatan::all(),
        ];
        return view('siswa.datasiswa', $data);
    }

    public function tambah(Request $request){

        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'numeric' => ':attribute harus berupa angka!',
            'integer' => ':attribute harus berupa bilangan bulat!',
            'mimes' => ':attribute harus berupa file jpg/png!',
            'unique' => ':attribute sudah ada di data!'
        ];

        $validasi = $request->validate([
            'nis' => 'required|numeric|unique:siswa',
            'nama' => 'required',
            'kelas' => 'required|integer',
            'angkatan' => 'required',
            'nohp' => 'required|numeric',
            'alamat' => 'required',
            'avatar' => 'required|mimes:jpg,png,jpeg',
        ], $messages);

        if($validasi) :
            $tambah = Siswa::create([
             'avatar' => $request->avatar,
             'nis' => $request->nis,
             'nama' => $request->nama,
             'id_kelas' => $request->kelas,
             'id_angkatan' => $request->angkatan,
             'nohp' => $request->nohp,
             'alamat' => $request->alamat,
         ]);

            if ($request->hasFile('avatar')) :
                $request->file('avatar')->move('uploads/', $request->file('avatar')->getClientOriginalName());
                $tambah->avatar = $request->file('avatar')->getClientOriginalName();
                $tambah->save();
            endif;

        endif;
        return redirect('/siswa');

    }

    public function edit($id){

       $data = [
        'user' => User::find(auth()->user()->id),
        'siswa' => Siswa::find($id),
        'kelas' => Kelas::all(),
        'angkatan' => Angkatan::all(),
        'tagihan' => Tagihan::all(),
        
    ];
    
    return view('siswa.detailsiswa', $data);

    }

    public function update(Request $request, $id){

       $Siswa = Siswa::find($id);
       $Siswa->update($request->all());

       if ($request->hasFile('avatar')) {
        $request->file('avatar')->move('uploads/', $request->file('avatar')->getClientOriginalName());
        $Siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $Siswa->update();
    }

    return back()->with('sukses', 'Data Berhasil Diedit');
                // return redirect('/siswa')->with('sukses', 'Data Berhasil Diedit');
    }

    public function hapus($id){

       $siswa = Siswa::where('id',$id)->delete();
       $Pembayaran =  Pembayaran::where('siswa_id',$id)->delete();

       return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function transaksi(Request $request, $id){
        $data = Siswa::find($id);
        if($data->tagihan()->where('tagihan_id', $request->tagihan)->exists()){
            return back()->with('error', 'Data Tagihan sudah ada di tabel siswa');
        }

        $data->tagihan()->attach($request->tagihan, ['kd_bayar' => mt_rand(00000000, 99999999), 'bayar' => $request->bayar]);

        return back()->with('sukses', 'Data Berhasil Ditambah');
    }

}
