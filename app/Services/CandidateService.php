<?php

namespace App\Services;

use App\Models\Candidate;

use Illuminate\Support\Collection;


class CandidateService
{
    const PER_PAGE = 20;

    /**
     * List candidates
     *
     * @return Collection
     */
    public function listCandidates(): Collection
    {
        return collect(Candidate::with('address')->paginate(self::PER_PAGE));
    }
}
