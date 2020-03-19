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
}
