<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CandidateController extends Controller
{
    /**
     * List candidates
     *
     * @return JsonResponse
     */
    public function listCandidates(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'page' => 'integer',
            'per_page' => 'integer',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $candidateService = new CandidateService();
        $candidates = $candidateService->listCandidates($validator->validated());

        return apiResponse($candidates, 'lista de candidatos');
    }

    public function updateCandidate(Request $request)
    {
        //
    }


    /**
     * List candidates
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
        $candidateService = new CandidateService();
        $candidates = $candidateService->listView($validator->validated());

        return view('candidates', ['data' => $candidates->toArray()]);
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
        
        $candidateService = new CandidateService();
        $cache = $candidateService->cache($validator->validated());

        return apiResponse($cache, 'cache criado com sucesso');
    }
}
