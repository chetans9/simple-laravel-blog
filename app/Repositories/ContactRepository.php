<?php

namespace App\Repositories;


use App\Repositories\Eloquent\Repository;

class ContactRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\ContactModel';
    }

}