<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'designation',
        'department',
        'role',
        'address',
        'school_id',
        'added_by',
        'status'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
