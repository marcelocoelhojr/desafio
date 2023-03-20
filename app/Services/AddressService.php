<?php

namespace App\Services;

use App\Exceptions\JobException;
use App\Models\Addresses;
use App\Models\Job;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AddressService
{
    /**
     * Create address
     *
     * @param array $params
     * @return Addresses
     */
    public function create(array $params): Addresses
    {
        $data = [
            'city' => $params['city'],
            'state' => $params['state'],
            'cep' => $params['cep'] ?? null,
            'neighborhood' => $params['neighborhood'] ?? null,
            'street' => $params['street'] ?? null,
            'description' => $params['description'],
            'number' => $params['number'],
            'complement' => $params['complement']
        ];

        return Addresses::create($data);
    }

    /**
     * Update address by id
     *
     * @param int $addressbId
     * @param array $params
     * @return void
     */
    public function updateAddress(int $addressbId, array $params): void
    {
        try {
            $data = [
                'city' => $params['city'],
                'state' => $params['state'],
                'cep' => $params['cep'],
                'neighborhood' => $params['neighborhood'],
                'street' => $params['street'],
                'number' => $params['number'],
                'complement' => $params['complement']
            ];
            Addresses::where('id', $addressbId)->update($data);
        } catch (Exception $e) {
            throw new JobException('erro ao atualizar vaga de emprego');
        }
    }

    /**
     * Delete address by id
     *
     * @param int $jobId
     * @return Collection
     */
    public function delete(int $addressId): Collection
    {
        return collect(Addresses::where('id', $addressId)->delete());
    }
}
