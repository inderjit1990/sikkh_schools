<?php

namespace App\Modules\Tenant\Repositories;

use App\Modules\Tenant\Models\School;
use App\Modules\Tenant\Models\Group;

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