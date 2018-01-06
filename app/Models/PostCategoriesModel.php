<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategoriesModel extends Model
{
    protected $table = "categories";

    protected $fillable = ["name"];

    public function posts()
    {
    	return $this->hasMany('App\Models\PostsModel', 'category_id');
    }

}
