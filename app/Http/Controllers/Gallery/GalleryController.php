<?php

namespace App\Http\Controllers\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    
    /**
	 * Display Gallery page
	 * 
	 **/
    public function index()
    {
    	return view('gallery.index');
    }
}
