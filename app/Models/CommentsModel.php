<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
	/**
     * Specify table name
     *
     * @var String
     */
    protected $table = "comments";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','post_id','user_name','user_email','content','active'];

    public function post()
    {
        return $this->belongsTo('App\Models\PostsModel','post_id');
    }
}
