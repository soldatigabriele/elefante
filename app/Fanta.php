<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fanta extends Model
{
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

	public function logo(){
		return $this->belongsTo('App\Logo');
	}

	public function getCountry(){
		return $this->country->name;
	}

	public function colours(){
		return $this->belongsToMany('App\Colour');
	}

	public function getColours(){
		return $this->colours->pluck('name');
	}

	public function images(){
		return $this->hasMany('App\Image');
	}

	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
	
	public function getTags(){
		return $this->tags->pluck('name');
	}

}
