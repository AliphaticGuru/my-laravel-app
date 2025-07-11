<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user, Job $job): bool
    {
        // Check if the job's employer is the same as the authenticated user
        return $job->employer->user->is($user);
    }
}
