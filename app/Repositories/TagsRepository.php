<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class TagsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\TagsModel';
    }

    /**
     * Get tags
     * @param $inputs
     * @return mixed
     */
    public function getTagsSuggestion($inputs)
    {
        return $this->model->select("id","name as text")->where("name","like","%$inputs[search]%")->get();
    }
}