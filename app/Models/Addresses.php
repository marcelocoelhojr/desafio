<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "state",
        "city",
        "cep",
        "neighborhood",
        "street",
        "number",
        "complement"
    ];

    public static array $rules = [
        'cep' => 'nullable|string',
        'neighborhood' => 'nullable|string',
        'street' => 'nullable|string',
        'state' => 'required|string',
        'city' => 'required|string',
        'number' => 'nullable|integer',
        'complement' => 'nullable|string',
        'addressId' => 'integer',
    ];
}
