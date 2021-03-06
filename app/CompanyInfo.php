<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_info';
    public $incrementing = false;
    public $primaryKey = 'user_id';
    public $timestamps = false;

    public function company() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
