<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = "posts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','category_id','slug','summary','content','featured_image','active','user_id'];

    /**
     * Belongs to one relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App/Models/CategoriesModel','category_id');
    }

    /**
     * Belongs to one relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function user()
    // {
    //     //return $this->belongsTo('App/User','user_id');
    // }
}
