<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = [
        'name',
        'school_id',
        'class_id',
        'status'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
