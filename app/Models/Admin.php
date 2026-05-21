<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'school_id',
        'role',
        'status',
        'last_login_at'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
