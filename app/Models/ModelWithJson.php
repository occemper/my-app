<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelWithJson extends Model
{
    /** @use HasFactory<\Database\Factories\ModelWithJsonFactory> */
    use HasFactory;

    protected $fillable = [
        'col'
    ];

    protected $casts = ['col'=>'array'];
}
