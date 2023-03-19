<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\JobListRequest;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Addresses;
use App\Models\JobVacancie;
use App\Services\JobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
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
        $rules = [
            'title' => 'required|string',
            'modality' => 'required|string',
            'type' => 'required|string',
            'salary' => 'numeric',
            'description' => 'string',
            'cep' => 'string',
            'neighborhood' => 'string',
            'street' => 'string',
            'state' => 'required|string',
            'city' => 'required|string',
            'number' => 'integer',
            'complement' => 'string',
        ];
        $validator = validate($rules, $request->all());
        $jobService = new JobService();
        $jobs = $jobService->create($validator->validated());

        return apiResponse($jobs, 'vaga de emprego criada com sucesso');
    }

    /**
     * Get jobs with pages
     *
     * @param Request $request
     */
    public function list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'integer',
            'per_page' => 'integer',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $jobService = new JobService();
        $jobs = $jobService->list($validator->validated());

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
