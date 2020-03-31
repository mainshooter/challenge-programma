<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    public $timestamps = false;

    public function organiser() {
      return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function students() {
      return $this->belongsToMany('App\User', 'student_event','event_id', 'student_id')->withPivot('was_present');
    }

    public function getEventStartDateTimeAttribute($value) {
      return date('Y/m/d H:i', strtotime($value));
    }

    public function getEventEndDateTimeAttribute($value) {
      return date('Y/m/d H:i', strtotime($value));
    }

    public function getEventStatusAttribute($value) {
        if($value == true) {
            return 'Evenement niet geaccepteerd';
        }

        else {
            return 'Evenement is geaccepteerd';
        }
    }
}
