<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function fanta(){
      return $this->belongsToMany('App\Fanta');
    }

}
