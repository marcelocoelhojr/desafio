<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
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
            'cep' => 'string',
            'neighborhood' => 'string',
            'street' => 'string',
            'state' => 'required|string',
            'city' => 'required|string',
            'number' => 'integer',
            'complement' => 'string',
        ];
        $validator = validate($rules, $request->all());
        $addressService = new AddressService();
        $address = $addressService->create($validator->validated());

        return apiResponse($address, 'endereço cadatrado com sucesso');
    }
}
