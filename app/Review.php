<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "review";

    public function company(){
      return  $this->belongsTo(User::class, 'user_id');
    }

}
