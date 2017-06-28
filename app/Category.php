<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	protected $table='category';

	public function post()
	{

		//one to many relationship
		// category has many posts

		return $this->hasMany('App\Post');
	}

}
