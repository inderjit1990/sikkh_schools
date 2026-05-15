<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'group_id',
        'name',
        'code',
        'subdomain',
        'domain',
        'email',
        'phone',
        'status',
        'verify_email_at',
        'password',
        'verification_token'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sessions()
    {
        return $this->hasMany(SchoolSession::class);
    }

    public function themeStyle()
    {
        return $this->hasOne(ThemeStyle::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
