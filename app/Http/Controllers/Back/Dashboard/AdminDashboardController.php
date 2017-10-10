<?php

namespace App\Http\Controllers\Back\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {

    	return view("back.dashboard");
    }
}
