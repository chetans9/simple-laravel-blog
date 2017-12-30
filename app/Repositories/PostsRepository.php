<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
use File;

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
     *
     * @return mixed
     */
     public function findActive($id)
    {
        return $this->model->with(["comments"=>function($query){
            $query->where('active','1');
        }])->where('active','1')->findOrFail($id);
    }

    public function create(array $inputs)
    {
        $model = $this->model->create($inputs);

        //save tags relation if users adds tags
        if(isset($inputs['tags']) && !empty($inputs['tags']))
        {
            $model->tags()->attach($inputs['tags']);
        }
        return $model;
    }

    /**
     * Update post along with relations like tags.
     *
     * @param array $inputs
     * @param $id
     * @param string $attribute
     * @return mixed|void
     */
    public function update(array $inputs, $id, $attribute = "id")
    {
        $model = $this->model->find($id);

        $model->update($inputs);

        if(isset($inputs['tags']) && !empty($inputs['tags']))
        {
            $model->tags()->sync($inputs['tags']);
        }
    }

    /**
     * Get Recent Posts to display on home page
     *
     * @return mixed
     */
    public function getRecentPosts()
    {
    	return $this->model->OrderBy('created_at','Desc')->where('active','1')->limit(6)->get();
    }

    /**
     * Get featured posts
     *
     * @return mixed
     */
     public function getFeaturedPosts()
    {
    	return $this->model->where('featured_post','1')->get();
    }

    public function search($request)
    {
        $query = $this->model;
        if($request->search_str)
        {
            $query = $query->where('title','like',"%$request[search_str]%");
        }
        $query = $query->where('active','1');

        return $query->paginate(10);


    }

    /**
     * Delete Post along with its relations.
     *
     * @param $id
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->model = $this->model->find($id);
        foreach ($this->model->featured_image as $image) {
            $image_path = public_path().$image;
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }   
        }
        $this->model->comments()->delete();
        $this->model->delete();
    }
}