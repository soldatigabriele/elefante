<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function fanta(){
      return $this->belongsTo('App\Fanta');
    }


}
