<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSession extends Model
{
    //
    protected $fillable = [
        'start_date',
        'end_date',
        'name',
        'is_current',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
