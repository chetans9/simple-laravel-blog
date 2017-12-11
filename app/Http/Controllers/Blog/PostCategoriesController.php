<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostCategoriesRepository;


class PostCategoriesController extends Controller
{
	protected $postCategoriesRepository;

	public function __construct(PostCategoriesRepository $postCategoriesRepository)
	{
		$this->postCategoriesRepository = $postCategoriesRepository;
	}

	/**
	 * 
	 */
    public function show($id)
    {
    	$category  = $this->postCategoriesRepository->findActive($id);
    	$posts = $this->postCategoriesRepository->paginateCategoryPosts($category);
    	

    	$data['category'] = $category;
    	$data['posts'] = $posts;
    	//dd($category);

    	return view('blog.category',$data);

    }
}
