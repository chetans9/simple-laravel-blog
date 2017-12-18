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

    /**
     * Get number of unread comments.
     *
     * @return mixed
     */
    function countUnreadComments()
    {
        return $this->model->where('read','!=','1')->count();
    }

    /**
     * Mark comment as read.
     *
     * @param $id
     */
    function markAsRead($id)
    {
        $model = $this->model->find($id);
        if($model->read == '0')
        {
            $model->read = 1;
            return $model->save();
        }
        return;


    }
}