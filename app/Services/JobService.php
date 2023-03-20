<?php

namespace App\Services;

use App\Exceptions\JobException;
use App\Models\Job;
use Exception;
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
            $response = Job::create([
                'address_id' => $address['id'],
                'title' => $params['title'],
                'modality' => $params['modality'],
                'type' => $params['type'],
                'salary' => (float)$params['salary'] ?? null,
                'description' => $params['description'] ?? null,
                'image' => $params['image'] ?? 'https://via.placeholder.com/640x640.png/0088aa?text=job+Faker+et'
            ]);
        });

        return collect($response);
    }

    /**
     * Get jobs with pages for view
     *
     * @return Collection
     */
    public function list(array $params): Collection
    {
        $perPage = $params['per_page'] ?? 5;

        return $this->getJobs($perPage);
    }

    /**
     * Update job by id
     *
     * @param int $jobId
     * @param array $params
     * @return void
     */
    public function update(int $jobId, array $params): void
    {
        try {
            DB::transaction(function () use ($jobId, $params) {
                $addressService = new AddressService();
                $addressService->update($params['addressId'], $params);
                Job::where('id', $jobId)->update([
                    'title' => $params['title'],
                    'modality' => $params['modality'],
                    'type' => $params['type'],
                    'status' => $params['status'],
                    'salary' => (float)$params['salary'],
                    'description' => $params['description']
                ]);
            });
        } catch (Exception $e) {
            throw new JobException('erro ao atualizar vaga de emprego');
        }
    }

    /**
     * Delete job by id
     *
     * @param int $job
     * @return void
     */
    public function delete(int $jobId): void
    {
        //TODO usar observer
        DB::transaction(function () use ($jobId) {
            $addressId = Job::select('address_id')->where('id', $jobId)->first();
            Job::where('id', $jobId)->delete();
            $addressService = new AddressService();
            $addressService->delete($addressId->address_id);
        });
    }

    /**
     * Get job by id
     *
     * @param int $jobId
     * @return Collection
     */
    public function getJob(int $jobId): Collection
    {
        return Job::with('address')->where('id', $jobId)->get();
    }

    /**
     * Get jobs with pages for view
     *
     * @return Collection
     */
    public function listView(array $params): Collection
    {
        $this->checkFilterCache($params);
        $perPage = $params['per_page'] ?? 5;

        return $this->getJobs($perPage);
    }

    /**
     * Get jobs with pages
     *
     * @param int $perPage
     * @return Collection
     */
    private function getJobs(int $perPage): Collection
    {
        return collect(Job::with('address')->paginate($perPage));
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
