<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    
    public function fantas(){
    	return $this->hasMany('App\Fanta');
    }

}
