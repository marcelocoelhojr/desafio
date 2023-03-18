<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        "state",
        "city",
        "cep",
        "neighborhood",
        "street",
        "number",
        "complement"
    ];
}