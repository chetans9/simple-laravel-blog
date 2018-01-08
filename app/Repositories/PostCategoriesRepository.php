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

    /**
     * Get Posts by Category Model. We also need to paginate results.
     *
     * @param $category
     * @return mixed
     */
    public function getPostsByCategory($category)
    {

        $this->model = $category;

        return $this->model->posts()->paginate(10);
    }

    public function findActive($id)
    {
        return $this->model->findOrFail($id);
    }
}