<?php

namespace App\Services;

use App\Models\JobVacancie;
use Illuminate\Support\Collection;

class JobService
{
    /**
     * Get jobs
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return collect(JobVacancie::with('address')->get());
    }
}
