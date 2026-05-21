<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffEnrollments extends Model
{
    protected $fillable = [
        'staff_id',
        'class_id',
        'section_id',
        'school_session_id',
        'school_id'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function schoolSession()
    {
        return $this->belongsTo(SchoolSession::class, 'school_session_id');
    }
}
