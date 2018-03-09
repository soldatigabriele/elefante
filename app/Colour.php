<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function fantas(){
    	return $this->belongsToMany('App\Fanta');
    }

}
