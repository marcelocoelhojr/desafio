<?php

namespace App\Services;

use App\Exceptions\AddressException;
use App\Models\Addresses;
use Exception;
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
        try {
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
        } catch (Exception) {
            throw new AddressException('erro ao cadastrar endereço');
        }
    }

    /**
     * Update addresses by id
     *
     * @param array $params
     * @return Collection
     */
    public function update(int $jobId, array $params): Collection
    {
        try {
            $data = [
                "state" => $params['state'],
                "city" => $params['city'],
                "cep" => $params['cep'] ?? null,
                "street" => $params['street'] ?? null,
                "number" => $params['number'] ?? null,
                "complement" => $params['complement'] ?? null,
                "neighborhood" => $params['neighborhood'] ?? null
            ];

            return collect(Addresses::where('id', $jobId)->update($data));
        } catch (Exception) {
            throw new AddressException('erro ao atualizar endereço');
        }
    }
}
