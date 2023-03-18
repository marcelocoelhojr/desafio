<?php

namespace App\Services;

use App\Models\JobVacancie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class JobService
{
    const CACHE_TIME = 76800; //2 hours in seconds
    const CACHE_FILTER_NAME =  'job_filters';

    /**
     * Get jobs with pages
     *
     * @return Collection
     */
    public function list(array $params): Collection
    {
        $this->checkFilterCache($params);
        $perPage = $params['per_page'] ?? 5;

        return collect(JobVacancie::with('address')->paginate($perPage));
    }

    /**
     * Create filter cache
     *
     * @param array $filter
     * @return void
     */
    public function cache(array $filters): void
    {
        Cache::put(self::CACHE_FILTER_NAME, $filters, self::CACHE_TIME);
    }

    /**
     * Check filter cache
     *
     * @param array $params
     * @return void
     */
    private function checkFilterCache(array &$params): void
    {
        if (Cache::has(self::CACHE_FILTER_NAME) == null) {
            return;
        }
        $params = Cache::get(self::CACHE_FILTER_NAME);
    }
}
