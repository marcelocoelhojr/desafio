<?php

namespace App\Services;

use App\Models\Addresses;
use Illuminate\Support\Collection;

class AddressService
{
    /**
     * Create addresses
     *
     * @param array $params
     * @return Collection
     */
    public function create(array $params): Collection
    {
        $data = [
            "state" => $params['state'],
            "city" => $params['city'],
            "cep" => $params['cep'] ?? null,
            "street" => $params['street'] ?? null,
            "number" => $params['number'] ?? null,
            "complement" => $params['complement'] ?? null,
            "neighborhood" => $params['neighborhood'] ?? null
        ];

        return collect(Addresses::create($data));
    }
}
