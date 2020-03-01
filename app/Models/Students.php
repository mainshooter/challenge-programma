<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [
     'password',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
}
