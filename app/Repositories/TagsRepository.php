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
}