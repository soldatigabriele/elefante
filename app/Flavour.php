<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function fanta(){
      return $this->belongsToMany('App\Fanta');
    }


}
