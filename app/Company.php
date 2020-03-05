<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'prefix', 
        'lastname',
        'companyname',
        'address',
        'postalcode',
        'phone',
        'email', 
        'password',
    ];
}
