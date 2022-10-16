<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\PostsModel;
use App\Models\User;
use App\Models\CommentsModel;

class PostsController extends Controller {

    /**
     * Show post 
     * 
     *  
     */
	public function show($id) 
    {
        
		$posts = PostsModel::active()->findOrFail($id);
        

        $data['post'] = $posts;
        
		return view("blog.post", $data);

	}


    public function storeComment(Request $request,$id)
    {

        $inputs = $request->all();
        $post = PostsModel::active()->findOrFail($id);

        $comment  = new CommentsModel();
        $comment->fill($inputs);
        $comment->post_id = $post->id;
        $comment->save();

        return back()->with("success","Success! Your Comment will be live after verification by admin");

    }
}
