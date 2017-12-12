<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class PostsRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\PostsModel';
    }

    /**
     * Get only active posts. Note that the method also eager loads comments. 
     */
     public function findActive($id)
    {
        return $this->model->with(["comments"=>function($query){
            $query->where('active','1');
        }])->where('active','1')->findOrFail($id);
    }


    /**
     * 
     */
    public function getRecentPosts()
    {
    	return $this->model->OrderBy('created_at','Desc')->where('active','1')->limit(6)->get();
    }

     public function getFeaturedPosts()
    {
    	return $this->model->where('featured_post','1')->get();
    }
}