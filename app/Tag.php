<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table='tags';

	public function Post()
	{
		
		//many to one relationships

		//post belongs to category

		return $this->belongsToMany('App\Post','post_tag','post_id','tag_id');

		// here parameter 2 is intermidiary table name its default value = post_tag alphabetically which model name comes first 

		// parameter 3 is foreign key from posts table

		// parameter 4 is foreign key from tags table

	}
}
