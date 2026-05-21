<?php

namespace App\Enums;

enum PostStatus:String
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case COMPLETED = 'completed';
    case FAILED = 'failed';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
            self::COMPLETED => 'Completed',
            self::FAILED => 'Failed',
        };
    }
}