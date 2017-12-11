<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use App\Repositories\Criteria\Posts\RecentPosts;
use Auth;


class HomeController extends Controller
{
	protected $postsRepository;

    protected $userRepository;

    protected $postCategoriesRepository;


	 public function __construct(PostsRepository $posts,UserRepository $users, PostCategoriesRepository $postCategoriesRepository)
    {
        
        $this->postsRepository = $posts;
        $this->userRepository = $users;
        $this->postCategoriesRepository = $postCategoriesRepository;
    }


	/**
	 * 
	 * 
	 */
    public function index()
    {

    	$data = array();
        $data['recent_posts'] = $this->postsRepository->getRecentPosts();

        $data['post_categories'] = $this->postCategoriesRepository->all();

        


        $data['featured_posts'] = $this->postsRepository->getFeaturedPosts();
    	return view('home',$data);
    }
}
