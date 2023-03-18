<?php

namespace App\Services;

use App\Models\JobVacancie;
use Illuminate\Support\Collection;

class JobService
{
    /**
     * Get jobs with pages
     *
     * @return Collection
     */
    public function list(array $param): Collection
    {
        $perPage = $param['per_page'] ?? 5;

        return collect(JobVacancie::with('address')->paginate($perPage));
    }
}
