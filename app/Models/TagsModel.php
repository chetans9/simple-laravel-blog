<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
	protected $table = "tags";
	protected $fillable = ["name"];

    /**
     * Belongs to Many Relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function blogs()
    {
	    return $this->belongsToMany('App\Models\BlogsModel','blog_tag','tag_id','blog_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\PostsModel','post_tag','tag_id','post_id');
    }
	
}
