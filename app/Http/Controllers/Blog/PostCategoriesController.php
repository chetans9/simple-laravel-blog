<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;


class PostCategoriesController extends Controller
{

    /**
     * Show posts By category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category  = CategoriesModel::findOrFail($id);
    	$posts = $category->posts()->where('posts.active','1')->paginate(10);
    	$data['category'] = $category;
    	$data['posts'] = $posts;
    	return view('blog.category',$data);

    }
}
