<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commence extends Model
{
    protected $fillable = ['period'];
    
    public function prospect(){
        return $this->belongsTo('App\Prospect');
    }
}
