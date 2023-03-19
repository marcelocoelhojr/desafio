<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobVacancie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'modality',
        'city',
        'state',
        'type',
        'salary',
        'image',
        'description',
        'address_id'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Addresses::class, 'address_id', 'id');
    }
}
