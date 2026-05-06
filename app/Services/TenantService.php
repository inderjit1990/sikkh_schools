<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

         $token = Str::random(64);

            // 1. Create Group
            $group = $this->repo->createGroup([
                'name' => $data['name'],
                'code' => Str::slug($data['name'], '_'),
                'mobile' => $data['phone'],
                'contact_email' => $data['email'],
            ]);

            // 2. Resolve domain / subdomain
            // $subdomain = $data['subdomain'] ?? null;
            // $domain = $data['domain'] ?? null;

            // 3. Create School
            $school = $this->repo->createSchool([
                'group_id' => $group->id,
                'name' => $data['name'],
                'code' => Str::slug($data['name'], '_'),

                'subdomain' => $data['subdomain'] ?? null,
                'domain' => $data['domain'] ?? null,
                // 'is_custom_domain' => $isCustomDomain,

                'email' => $data['email'],
                'phone' => $data['phone'],

                'password' => Hash::make($data['password']),
                'verification_token' => $token,
        ]);

        // 🔥 Dispatch email job
        dispatch(new \App\Jobs\SendVerificationEmailJob($school));

            // 🔥 NEXT STEP: create tenant DB / schema here

            return $school;
        });
    }
}