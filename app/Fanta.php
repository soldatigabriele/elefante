<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fanta extends Model
{
	use Taggable;
  use SoftDeletes;

	protected $guarded = [];
  protected $dates = ['deleted_at'];

	public function flavours(){
		return $this->hasOne('App\Flavour');
	}

	public function countries(){
		return $this->hasOne('App\Country');
	}

	public function colours(){
		return $this->hasMany('App\Colour');
	}

	public function images(){
		return $this->hasMany('App\Image');
	}

	public function tags(){
		return $this->hasMany('App\Tag');
	}

}
