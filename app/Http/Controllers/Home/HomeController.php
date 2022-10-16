<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostsModel;
use App\Models\User;
use App\Models\CategoriesModel;
use App\Models\TagsModel;
use Auth;


class HomeController extends Controller
{

    /**
     * Show home page
     *  
     * 
     * @return view
     */
    public function index()
    {

    	$data = array();
        $data['recent_posts'] = PostsModel::OrderBy('created_at', 'Desc')->where('active', '1')->limit(6)->get();
        $data['post_categories'] = CategoriesModel::latest()->limit(25)->get();
        $data['tags'] =  TagsModel::has('posts')->get();
        $data['featured_posts'] = PostsModel::where('featured_post', '1')->get();
    	return view('home',$data);
    }
}
