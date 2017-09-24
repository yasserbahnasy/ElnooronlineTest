<?php

namespace App;
use App\Like;

use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');	
    }

    public function like(){
        return $this->hasOne('Like');    
    }
    
}
