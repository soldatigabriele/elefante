<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['fanta_id', 'original_name', 'normal_size', 'full_size', 'original_size'];
    
    public function fanta(){
  		return $this->belongsTo('App\Fanta');
    }


}
