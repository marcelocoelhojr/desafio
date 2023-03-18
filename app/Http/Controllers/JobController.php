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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
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
}
