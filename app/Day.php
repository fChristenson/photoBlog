<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {

	public function photos () {
		return $this->hasMany('App\Photo');
	}

}
