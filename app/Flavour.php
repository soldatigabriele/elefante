<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function fantas(){
    	return $this->hasMany('App\Fanta');
    }


}
