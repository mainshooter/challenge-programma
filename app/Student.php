<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'prefix', 
        'lastname',
        'phone',
        'schoolyear', 
        'email', 
        'password',
    ];
}
