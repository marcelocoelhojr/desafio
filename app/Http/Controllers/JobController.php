<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Http\Resources\JobsListCollection;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    /**
     * Create job
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validator = validate(Job::$rules, $request->all());
        $jobService = new JobService();
        $jobs = $jobService->create($validator->validated());

        return apiResponse($jobs, 'vaga de emprego cadastrada com sucesso');
    }

    /**
     * Get jobs with pages for view
     *
     * @param Request $request
     */
    public function list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $jobService = new JobService();
        $jobs = $jobService->list($validator->validated());

        return apiResponse(new JobsListCollection($jobs), 'lista de vagas');
    }

    /**
     * Get job by id
     *
     * @param int $jobId
     * @return JsonResponse
     */
    public function getJob(int $jobId): JsonResponse
    {
        $jobService = new JobService();
        $job = $jobService->getJob($jobId);

        return apiResponse(new JobResource($job), 'consulta realizada com sucesso');
    }

    /**
     * Update job by id
     *
     * @param int $jobId
     * @return JsonResponse
     */
    public function update(Request $request, int $jobId): JsonResponse
    {
        $validator = validate(Job::$rules, $request->all());
        $jobService = new JobService();
        $jobService->update($jobId, $validator->validated());

        return apiResponse([], 'atualização realizada com sucesso');
    }

    /**
     * Delete job by id
     *
     * @param int $jobId
     * @return JsonResponse
     */
    public function delete(int $jobId): JsonResponse
    {
        $jobService = new JobService();
        $jobService->delete($jobId);

        return apiResponse([], 'vaga deletada com sucesso');
    }

    /**
     * Get jobs with pages for view
     *
     * @param Request $request
     */
    public function listView(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'integer',
            'per_page' => 'integer',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $jobService = new JobService();
        $jobs = $jobService->listView($validator->validated());

        return view('jobs', ['data' => $jobs->toArray()]);
    }

    /**
     * Create filter cache
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function filterCache(Request $request): JsonResponse
    {
        $rules = ['per_page' => 'integer'];
        $validator = validate($rules, $request->all());
        
        $jobService = new JobService();
        $cache = $jobService->cache($validator->validated());

        return apiResponse($cache, 'cache criado com sucesso');
    }
}
