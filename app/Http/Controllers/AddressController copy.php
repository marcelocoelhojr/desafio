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

class AddressController extends Controller
{
    /**
     * Create job
     */
    public function create(Request $request)
    {
        $rules = [
            'cep' => 'string',
            'neighborhood' => 'string',
            'street' => 'string',
            'state' => 'state',
            'number' => 'integer',
            'complement' => 'string',
        ];
        $validator = validate($rules, $request->all());
        $jobService = new JobService();
        $jobs = $jobService->create($validator->validated());
    }
}
