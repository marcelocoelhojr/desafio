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
     */
    public function create(Request $request)
    {
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
     * @return Response
     */
    public function filterCache(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'integer',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $jobService = new JobService();
        $jobService->cache($validator->validated());

        return Response('success', 200);
    }
}
