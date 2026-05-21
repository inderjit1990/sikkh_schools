<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'date_of_birth',
        'signature',
        'full_name',
        'school_id',
        'status'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_student', 'student_id', 'class_id')
                    ->withTimestamps();
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_student', 'student_id', 'section_id')
                    ->withTimestamps();
    }
}
