<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	public function Day()
	{
	    return $this->belongsTo('App\Day');
	}

}
