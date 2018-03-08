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

	public function flavour(){
		return $this->belongsTo('App\Flavour');
	}

	public function getFlavour(){
		return $this->flavour->name;
	}

	public function country(){
		return $this->belongsTo('App\Country');
	}

	public function getCountry(){
		return $this->country->name;
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
