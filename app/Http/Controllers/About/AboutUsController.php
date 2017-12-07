<?php

namespace App\Http\Controllers\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
	/**
	 * Display About us page
	 * 
	 * 
	 **/
    public function index()
    {
    	return view('about_us.index');
    }
}
