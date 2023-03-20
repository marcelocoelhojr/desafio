<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * List candidates
     *
     * @return JsonResponse
     */
    public function listCandidates(): JsonResponse
    {
        $candidateService = new CandidateService();
        $candidates = $candidateService->listCandidates();

        return apiResponse($candidates, 'lista de candidatos');
    }

    public function updateCandidate(Request $request)
    {
        //
    }


    /**
     * List candidates
     */
    public function listView()
    {
        $candidateService = new CandidateService();
        $candidates = $candidateService->listCandidates();

        return view('candidates', ['data' => $candidates->toArray()]);
    }
}
