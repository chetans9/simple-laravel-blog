<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class PostCategoriesRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
 
    function model()
    {
        return 'App\Models\PostCategoriesModel';
    }

    public function paginateCategoryPosts($category)
    {
        $this->model = $category;
        return $this->model->posts()->paginate(10);
    }

    public function findActive($id)
    {
        return $this->model->where('active','1')->findOrFail($id);
    }
}