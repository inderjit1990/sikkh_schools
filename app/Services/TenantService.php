<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\TenantRepository;

class TenantService
{
    protected $repo;

    public function __construct(TenantRepository $repo)
    {
        $this->repo = $repo;
    }

    public function register($data)
    {
        return DB::transaction(function () use ($data) {

            // 1. Create Group
            $group = $this->repo->createGroup([
                'name' => $data['group_name'],
                'code' => strtolower(str_replace(' ', '_', $data['group_name'])),
                'mobile' => $data['group_mobile'],
                'contact_email' => $data['group_email'],
            ]);

            // 2. Prepare domain
            $subdomain = strtolower($data['sub_domain']);
            $domain = $subdomain . '.sikhschools.com';

            // 3. Create School
            $school = $this->repo->createSchool([
                'group_id' => $group->id,
                'name' => $data['school_name'],
                'code' => strtolower(str_replace(' ', '_', $data['school_name'])),
                'sub_domain' => $subdomain,
                'domain' => $domain,
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);

            // 🔥 NEXT: schema creation (we’ll add next step)

            return $school;
        });
    }
}