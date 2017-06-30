<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	protected $table='posts';


	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function category()
	{

		//many to one relationships

		//post belongs to category

		return $this->belongsTo('App\Category');
	}


	public function tag()
	{

		//Many To Many Relationship

		//Tag belongs to many posts

		return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
	}

	public function comments()
	{
		// comments belong to one post

		return $this->hasMany('App\Comment');
	}
}
