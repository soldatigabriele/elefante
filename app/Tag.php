<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	public function fantas(){
		return $this->belongsToMany('App\Fanta');
	}
}
