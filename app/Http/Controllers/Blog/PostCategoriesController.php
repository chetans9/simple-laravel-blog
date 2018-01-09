<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostCategoriesRepository;


class PostCategoriesController extends Controller
{
    /**
     * @var PostCategoriesRepository
     */
	protected $postCategoriesRepository;

    /**
     * PostCategoriesController constructor.
     *
     * @param PostCategoriesRepository $postCategoriesRepository
     */
	public function __construct(PostCategoriesRepository $postCategoriesRepository)
	{
		$this->postCategoriesRepository = $postCategoriesRepository;
	}

    /**
     * Show posts By category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category  = $this->postCategoriesRepository->findActive($id);
    	$posts = $this->postCategoriesRepository->paginatePostsByCategory($category);
    	$data['category'] = $category;
    	$data['posts'] = $posts;
    	return view('blog.category',$data);

    }
}
