<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'code',
        'percentage',
        'active',
        'expires_at',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}
