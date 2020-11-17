<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(){

    	return view('auth.login');

    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // $data = Http::post('http://localhost:8000/login', [
        //             'username' => $request->username,
        //             'password' => $request->password
        //     ]);
        // // session(['berhasil_login' => true]);
        // // return redirect('dashboard')->with('sukses', 'Berhasil Login');

        // if(!$request->username == 'admin'){
        //     return redirect('login')->with('errorr', 'Login Gagal');
        // } else {
        //     session(['berhasil_login' => true]);
        //     return redirect('dashboard')->with('sukses', 'Berhasil Login');
        // }
    
        //return response($data)->header('Content-Type', 'application/json');
       
            

          
        //      return view('/dashboard')->with('sukses', 'Berhasil Login');
        //      return response()->json([
        //         'status' => 'Login success'
        //     ])->header('Content-Type', 'application/json');


        
    	if ($data = Auth::attempt($request->only('username','password'))) {
            // return response($request)->header('Content-Type', 'application/json');
            session(['berhasil_login' => true]);
    		return redirect('/dashboard')->with('sukses', 'Berhasil Login');
    	} else {
            return redirect('login')->with('errorr', 'Login Gagal! Username / Password Salah!');
        }

    }

    // public function register()
    // {
    // 	return view('auth.register');
    // }

    // public function postRegister(Request $request)
    // {

    // 	$this->validate($request, [
    // 		'name' => 'required|max:50',
    // 		'username' => 'required|unique:users|max:50',
    // 		'email' => 'required|email|unique:users',
    // 		'password' => 'required|confirmed'
    // 	]);

    // 	User::create([
    // 		'name' => $request->name,
    // 		'username' => $request->username,
    // 		'email' => $request->email,
    // 		'password' => bcrypt($request->password)
    // 	]);

    // 	return redirect('/login')->with('sukses', 'Berhasil Daftar');
    // }


    public function logout(Request $request){

    	$request->session()->flush();
    	return redirect('login')->with('sukses', 'Berhasil Logout');

    }


}
