<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    
    protected $fillable = [
            'categorie_id',
            'name',
            'description',
            'origine',
            'unit',
            'image',
            'price',
            'sale_price',
            'stock',
            'version',
            'active',
            'featured'
        ];

    protected $casts = [
            'price' => 'integer',
            'sale_price' => 'integer',
            'stock' => 'integer',
            'version' => 'integer',
            'active' => 'boolean',
            'featured' => 'boolean',
        ];

    public function categorie(): BelongsTo{
        return $this->belongsTo(Categorie::class);
    }
}
