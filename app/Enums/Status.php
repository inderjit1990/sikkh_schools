<?php

namespace App\Enums;

enum Status:String
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DELETED = 'deleted';
    case SUSPENDED = 'suspended';
    case PENDING = 'pending';
    case ARCHIVED = 'archived';
    case EXPIRED = 'expired';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';
    case PROCESSING = 'processing';
    case FAILED = 'failed';

     public function label(): string
    {
        return match($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::DELETED => 'Deleted',
            self::SUSPENDED => 'Suspended',
            self::PENDING => 'Pending',
            self::ARCHIVED => 'Archived',
            self::EXPIRED => 'Expired',
            self::CANCELLED => 'Cancelled',
            self::COMPLETED => 'Completed',
            self::REJECTED => 'Rejected',
            self::APPROVED => 'Approved',
            self::PROCESSING => 'Processing',
            self::FAILED => 'Failed',
        };
    }

}
