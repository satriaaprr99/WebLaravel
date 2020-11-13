<?php

namespace App\Http\Controllers;

use Auth;
use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(){

    	return view('auth.login');

    }

    public function postLogin(Request $request){

    	if (Auth::attempt($request->only('username','password'))) {
    		return redirect('/dashboard')->with('sukses', 'Berhasil Login');
    	}

    	return redirect('/login')->with('sukses', 'Login Gagal');

    }

    public function register()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {

    	$this->validate($request, [
    		'name' => 'required|max:50',
    		'username' => 'required|unique:users|max:50',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed'
    	]);

    	User::create([
    		'name' => $request->name,
    		'username' => $request->username,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);

    	return redirect('/login')->with('sukses', 'Berhasil Daftar');
    }


    public function logout(){

    	Auth::logout();

    	return redirect('/login')->with('sukses', 'Berhasil Logout');

    }


}
