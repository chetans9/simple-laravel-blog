<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
use File;

class GalleryRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\GalleryModel';
    }

    public function getActive()
    {
        return $this->model->orderBy('created_at','asc')->get();
    }

    /**
     * Update the gallery. function first deletes the previous images. and new image paths are updated.
     *
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed\
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $model = $this->model->find($id);
        if(isset($data['image']) && $data['image'] == true){
            foreach ($model->image as $image) {
                $image_path = public_path().$image;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
            }
        }
        $model->update($data);

        return $model;
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
        foreach ($this->model->image as $image) {
            $image_path = public_path().$image;
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }   
        }
        $this->model->delete();
    }
}