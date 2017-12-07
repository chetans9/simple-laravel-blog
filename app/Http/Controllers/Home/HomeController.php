<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use Auth;


class HomeController extends Controller
{
	protected $postsRepository;

    protected $userRepository;

    protected $posts_categories;


	 public function __construct(PostsRepository $posts,UserRepository $users, PostCategoriesRepository $posts_categories)
    {
        $this->middleware('auth');
        $this->postsRepository = $posts;
        $this->userRepository = $users;
        $this->posts_categories = $posts_categories;
    }


	/**
	 * 
	 * 
	 */
    public function index()
    {

    	$data = array();

    	$data['recent_posts'] = $this->postsRepository->all();

    	return view('home',$data);
    }
}
