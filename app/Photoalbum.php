<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoalbum extends Model
{
    protected $table = 'photoalbum';
    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany(ImageFromAlbum::class);
    }

    public function event() {
      return $this->belongsTo('App\Event');
    }

    public function getEventIdAttribute() {
      return $this->event()->get()->event_id;
    }
}
