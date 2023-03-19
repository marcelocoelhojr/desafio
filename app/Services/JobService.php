<?php

namespace App\Services;

use App\Models\Addresses;
use App\Models\JobVacancie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class JobService
{
    const CACHE_TIME = 76800; //2 hours in seconds
    const CACHE_FILTER_NAME =  'job_filters';

    /**
     * Create job and address
     *
     * @param array $params
     * @return Collection
     */
    public function create(array $params): Collection
    {
        $response = [];
        DB::transaction(function () use ($params, &$response) {
            $addressService = new AddressService();
            $address = $addressService->create($params);
            $response = JobVacancie::create([
                'address_id' => $address['id'],
                'title' => $params['title'],
                'modality' => $params['modality'],
                'type' => $params['type'],
                'salary' => (double)$params['salary'] ?? null,
                'description' => $params['description'] ?? null,
                'image' => $params['image'] ?? 'https://via.placeholder.com/640x640.png/0088aa?text=job+Faker+et'
            ]);
        });

        return collect($response);
    }

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
     * @return array
     */
    public function cache(array $filters): array
    {
        Cache::put(self::CACHE_FILTER_NAME, $filters, self::CACHE_TIME);

        return $filters;
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
