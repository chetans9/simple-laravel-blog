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
     * 
     */
    public function getRecentPosts()
    {
    	return $this->model->OrderBy('created_at','Desc')->limit(6)->get();
    }

     public function getFeaturedPosts()
    {
    	return $this->model->where('featured_post','1')->get();
    }
}