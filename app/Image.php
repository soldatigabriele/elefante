<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['fanta_id', 'original_name', 'path', 'full_size'];
    
    public function fanta(){
  		return $this->belongsTo('App\Fanta');
    }


}
