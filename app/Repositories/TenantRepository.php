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

    public function findSchool($identifier,$key = 'id')
    {
        return School::where($key, $identifier)->first();
    }

    public function findSchoolWithMany($identifier,$key = ['id'],$with = [])
    {
        $query = School::query();

        foreach ($key as $no => $k) {
                if ($no == 0) {
                    $query->where($k, $identifier);
                } else {
                    $query->orWhere($k, $identifier);
                }
        }
        if (!empty($with)) {
            $query->with($with);
        }
        return $query->first();
    }
}