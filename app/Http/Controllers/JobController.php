<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Addresses;
use App\Models\JobVacancie;
use App\Services\JobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function list()
    {
        $jobService = new JobService();
        $jobs = $jobService->list();

        return view('jobs', ['data' => $jobs->toArray()]);
    }
}
