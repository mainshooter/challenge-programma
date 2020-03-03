<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use Notifiable;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'prefix', 'lastname','phone','schoolyear', 'email', 'password',
    ];

    protected $connection = 'laravel';

    protected $guarded = ['id'];
    protected $hidden = [
     'password',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
}
