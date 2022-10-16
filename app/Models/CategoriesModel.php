<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = "categories";

    protected $fillable = ["name"];

    /**
     * Belongs to one relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\PostsModel','category_id');
    }

}
