<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    public $timestamps = false;

    public function students() {
      return $this->belongsToMany('App\User', 'student_event','event_id', 'student_id')->withPivot('was_present');
    }
}
