<?php

namespace App\Repositories;

use App\Models\School;
use App\Models\Group;

class TenantRepository
{
    public function createGroup(array $data)
    {
        return Group::create($data);
    }

    public function createSchool(array $data)
    {
        return School::create($data);
    }
}