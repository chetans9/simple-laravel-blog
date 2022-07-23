<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentsModel;
use App\Models\ContactModel;


class AdminDashboardController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = array();

        $num_unread_comments = CommentsModel::where('read','!=','1')->count();
        $num_unread_contact = ContactModel::where('seen','!=','1')->count();


        $data['num_unread_contact'] = $num_unread_contact;
        $data['num_unread_comments'] = $num_unread_comments;
    	return view("admin.dashboard",$data);
    }
}
