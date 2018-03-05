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


    
}
