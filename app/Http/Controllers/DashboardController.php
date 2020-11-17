<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

	public function __construct()
	{
		$this->middleware('CheckLogin');
	}

	public function index(){
		
		$model = Http::get('http://localhost:8000/dashboard')->json();
		$model2 = Http::get('http://localhost:8000/dashboardhistori')->json();
		return view('pages.dashboard.dashboard', compact('model', 'model2'));
	}
}
