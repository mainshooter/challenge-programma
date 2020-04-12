<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageFromAlbum extends Model
{
    protected $table = 'image_from_album';
    public $timestamps = false;

    public function photoalbum()
    {
        return $this->belongsTo(Photoalbum::class);
    }
}
