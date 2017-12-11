<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{
	  protected $PostCategoriesRepository;

    protected $usersRepository;

    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository,UserRepository $usersRepository,PostCategoriesRepository $categoriesRepository)
    {
        $this->middleware('auth');
        $this->PostCategoriesRepository = $categoriesRepository;
        $this->usersRepository = $usersRepository;
        $this->postsRepository = $postsRepository;

    }
   	public function show($id)
   	{
   		$data['post'] = $this->postsRepository->findActive($id);
   		return view("blog.post",$data);

   	}
}
