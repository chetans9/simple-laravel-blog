<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostCategoriesRepository;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\CommentsRepository;

class PostsController extends Controller {
	

	protected $usersRepository;

	protected $postsRepository;

    protected $commentsRepository;

	public function __construct(PostsRepository $postsRepository, UserRepository $usersRepository, CommentsRepository $commentsRepository) 
    {
		
		$this->usersRepository = $usersRepository;
		$this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;

	}
	public function show($id) 
    {
        
		$posts = $this->postsRepository->findActive($id);
        

        $data['post'] = $posts;
        
		return view("blog.post", $data);

	}


    public function storeComment(Request $request,$id)
    {


        $inputs = $request->all();

        //Save post id
        $inputs['post_id'] = $id;

        $comment = $this->commentsRepository->create($inputs);
        if($comment)
        {
            return back()->with("success","Success! Your Comment will be live after verification by admin");
        }
        else
        {
            return back()->with("failure","Something went wrong");

        }


    }
}
