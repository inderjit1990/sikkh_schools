<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    //
    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = [
        'group_id',
        'name',
        'code',
        'subdomain',
        'domain',
        'email',
        'phone',
        'status',
        'email_verified_at',
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
