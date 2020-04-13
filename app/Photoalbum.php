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
}
