<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'student_info';
    public $incrementing = false;
    public $primaryKey = 'user_id';
    public $timestamps = false;
}
