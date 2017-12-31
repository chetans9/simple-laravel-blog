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

    /**
     * Get number of unread contact us request.
     *
     * @return mixed
     */
    public function countUnreadContact()
    {
        return $this->model->where('seen','!=','1')->count();
    }

    /**
     * Mark Contact row as read.
     *
     * @param $id
     */
    public function markAsRead($id)
    {
        $model = $this->model->find($id);
        if($model->seen == '0')
        {
            $model->seen = 1;
            return $model->save();
        }
        return;


    }

}