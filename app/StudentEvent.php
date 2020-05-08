<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEvent extends Model
{
    protected $table = 'student_event';
    public $incrementing = false;
    public $primaryKey = 'student_id';
    public $timestamps = false;
}
