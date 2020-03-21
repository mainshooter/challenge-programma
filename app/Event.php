<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    public $timestamps = false;

    public function students() {
      return $this->belongsToMany('App\User', 'student_event','event_id', 'student_id');
    }

    public function getEventStartDateTimeAttribute($value) {
      return date('Y/m/d H:i', strtotime($value));
    }

    public function getEventEndDateTimeAttribute($value) {
      return date('Y/m/d H:i', strtotime($value));
    }
}
