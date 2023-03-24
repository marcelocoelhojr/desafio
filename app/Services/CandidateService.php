<?php

namespace App\Services;

use App\Models\Candidate;
use Illuminate\Support\Collection;

class CandidateService
{
    const PER_PAGE = 20;
    const CACHE_TIME = 76800; //2 hours in seconds
    const CACHE_FILTER_NAME =  'candidate_filters';

    /**
     * List candidates
     *
     * @param array $params
     * @return Collection
     */
    public function listCandidates(array $params): Collection
    {
        $perPage = $params['per_page'] ?? self::PER_PAGE;

        return $this->getCandidates($perPage);
    }

    public function listView(array $params)
    {
        $cache = new CacheService();
        $cache->checkFilterCache($params, self::CACHE_FILTER_NAME);
        $perPage = $params['per_page'] ?? self::PER_PAGE;

        return $this->getCandidates($perPage);
    }

    /**
     * Get candidates with paginate
     *
     * @param integer $perPage
     * @return Collection
     */
    private function getCandidates(int $perPage): Collection
    {
        return collect(Candidate::with('address')->paginate($perPage));
    }

    /**
     * Create filter cache
     *
     * @param array $filter
     * @return array
     */
    public function cache(array $filters): array
    {
        $cache = new CacheService();

        return $cache->createFilterCache($filters, self::CACHE_FILTER_NAME, self::CACHE_TIME);
    }
}
