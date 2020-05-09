<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $table = "image";
    protected $fillable = ['id', 'name', 'filepath'];

    public function getImageSrcAttribute() {
      return Storage::url($this->filepath);
    }
}
