<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
   protected $fillable = ['title_id','gender_id','program_id', 'first_name', 'last_name', 'middle_name', 'identification', 'progress', 'user_id', 'student',
                          'school_a', 'degree_a', 'field_a', 'commence_id', 'graduation_id','grade_a','school_b', 'degree_b', 'field_b','grade_b', 'certificate',
                        'transcript', 'resume', 'motivation' ];

   public function user(){
       return $this->belongsTo('App\User');
   }

   public function commence(){
       return $this->belongsTo('App\Commence');
   }

   public function graduation(){
       return $this->belongsTo('App\Graduation');
   }
}
