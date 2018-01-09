<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategoriesModel extends Model
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
        return $this->belongsToMany('App\Models\PostsModel','post_category','category_id','post_id');
    }

}
