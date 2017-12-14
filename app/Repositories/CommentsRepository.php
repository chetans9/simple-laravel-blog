<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class CommentsRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\CommentsModel';
    }

    function all($columns=array('*'))
    {
        return $this->model->with(['post'])->get();
    }
    
}