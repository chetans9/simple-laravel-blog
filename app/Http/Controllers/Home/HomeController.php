<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use App\Repositories\TagsRepository;
use Auth;


class HomeController extends Controller
{
	protected $postsRepository;
    
    protected $userRepository;
    
    protected $postCategoriesRepository;

    protected $tagsRepository;
    

	 public function __construct(PostsRepository $posts,UserRepository $users, PostCategoriesRepository $postCategoriesRepository,TagsRepository $tagsRepository)
    {
        
        $this->postsRepository = $posts;
        $this->userRepository = $users;
        $this->postCategoriesRepository = $postCategoriesRepository;
        $this->tagsRepository = $tagsRepository;
    }


    /**
     * Show home page
     *  
     * 
     * @return view
     */
    public function index()
    {

    	$data = array();
        $data['recent_posts'] = $this->postsRepository->getRecentPosts();

        $data['post_categories'] = $this->postCategoriesRepository->all();

        $data['tags'] = $this->tagsRepository->all();

        $data['featured_posts'] = $this->postsRepository->getFeaturedPosts();
    	return view('home',$data);
    }
}
