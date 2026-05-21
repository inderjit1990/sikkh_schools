<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = [
        'name',
        'school_id',
        'status',
        'teacher_in_charge'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
