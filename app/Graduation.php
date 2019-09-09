<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    protected $fillable = ['period'];

     public function prospect(){
        return $this->belongsTo('App\Prospect');
    }
}
