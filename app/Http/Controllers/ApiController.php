<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;

class ApiController extends Controller
{

	public function __construct()
    {
        $this->middleware('CheckLogin');
    }

    public function index(){
    	
		$global  = Http::get('https://api.covid19api.com/summary')->json();
    	$indo = Http::get('https://apicovid19indonesia-v2.vercel.app/api/indonesia/more')->json();
    	$indo2 = Http::get('https://api.kawalcorona.com/indonesia/provinsi/')->json();

    	return view('pages.dashboard.corona', compact('global', 'indo', 'indo2'));
    	
    }

    public function berita(){

		$berita  = Http::get('https://newsapi.org/v2/top-headlines', [
				    'country' => 'id',
				    'apiKey' => '3a598962023a40a9819a945dee5bcc80',
				])->json();

    	return view('pages.dashboard.berita', compact('berita'));
    }
}
