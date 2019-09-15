<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name'];

    public function prospect(){
        return $this->belongsTo('App\User');
    }
}
