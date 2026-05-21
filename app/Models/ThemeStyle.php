<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeStyle extends Model
{
    //
    protected $fillable = [
        'primary_color',
        'secondary_color',
        'background_color',
        'text_color',
        'font_family',
        'button_color',
        'button_text_color',
        'link_color',
        'header_color',
        'footer_color',
        'logo',
        'theme',
        'school_id',
    ];
}
