<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Spp;
use App\Pembayaran;
use Alert;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = [
            'user' => User::find(auth()->user()->id),
            'siswa' => Siswa::orderBy('nis', 'ASC')->paginate(10),
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ];

        return view('siswa.datasiswa', $data);

    	// if($request->has('cari')){
    	// 	$Siswa = \App\Siswa::where('nama', 'LIKE','%'.$request->cari.'%')->get();
    	// }else if($request->has('cari')){
     //        $Siswa = \App\Siswa::where('nis', 'LIKE','%'.$request->cari.'%')->get();
    	// }else{
    	// 	$Siswa = \App\Siswa::all()->sortBy('nis');
    	// }
    	// return view('siswa.datasiswa', ['Siswa' => $Siswa]);
    }

    public function tambah(Request $request){

        // $messages = [
        //     'required' => ':attribute tidak boleh kosong!',
        //     'numeric' => ':attribute harus berupa angka!',
        //     'integer' => ':attribute harus berupa bilangan bulat!'
        // ];

        // $validasi = $request->validate([
        //     'nis' => 'required|numeric',
        //     'nama' => 'required',
        //     'kelas' => 'required|integer',
        //     'nohp' => 'required|numeric',
        //     'alamat' => 'required',
        //     'spp' => 'required|integer',
        // ], $messages);

        // if($validasi) :
        $tambah = Siswa::create([
         'avatar' => $request->avatar,
         'nis' => $request->nis,
         'nama' => $request->nama,
         'id_kelas' => $request->kelas,
         'nohp' => $request->nohp,
         'alamat' => $request->alamat,
         'id_spp' => $request->spp
     ]);

        if ($request->hasFile('avatar')) :
            $request->file('avatar')->move('uploads/', $request->file('avatar')->getClientOriginalName());
            $tambah->avatar = $request->file('avatar')->getClientOriginalName();
            $tambah->save();
        endif;


      // endif;

        return redirect('/siswa');

    //   $User  = new \App\User;
    //   $User->avatar = $request->avatar;
    //   $User->name = $request->nama;
    //   $User->username = $request->nis;
    //   $User->email = $request->email;
    //   $User->password = bcrypt($request->nis);
    //   $User->remember_token = str::random(50);
    //   $User->level = 'siswa';
    //   $User->save();

    //   if ($request->hasFile('avatar')) {
    //     $request->file('avatar')->move('uploads/', $request->file('avatar')->getClientOriginalName());
    //     $User->avatar = $request->file('avatar')->getClientOriginalName();
    //     $User->save();
    // }

    // $request->request->add(['user_id' => $User->id ]);
    // $Siswa = \App\Siswa::create($request->all());

    // return redirect('/datasiswa')->with('sukses', 'Data Berhasil Ditambah');

    }

    public function edit($id){

       $data = [
        'user' => User::find(auth()->user()->id),
        'siswa' => Siswa::find($id),
        'kelas' => Kelas::all(),
        'spp' => Spp::all(),
    ];
    return view('siswa.detailsiswa', $data);

}

    public function update(Request $request, $id){

       $Siswa = \App\Siswa::find($id);
       $Siswa->update($request->all());

       if ($request->hasFile('avatar')) {
        $request->file('avatar')->move('uploads/', $request->file('avatar')->getClientOriginalName());
        $Siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $Siswa->update();
        }
        
        return back();
        // return redirect('/siswa')->with('sukses', 'Data Berhasil Diedit');
    }

    public function hapus($id){

       $delete = \App\Siswa::find($id);
       $status = $delete->delete();

       return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }


}
