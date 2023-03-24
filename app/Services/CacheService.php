<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Create filter cache
     *
     * @param array $filter
     * @param string $name
     * @param integer $time
     * @return array
     */
    public function createFilterCache(array $filters, string $name, int $time): array
    {
        Cache::put($name, $filters, $time);

        return $filters;
    }

    /**
     * Check filter cache
     *
     * @param array $params
     * @param string $name
     * @return void
     */
    public function checkFilterCache(array &$params, string $name): void
    {
        if (Cache::has($name) == null) {
            return;
        }
        $params = Cache::get($name);
    }
}
