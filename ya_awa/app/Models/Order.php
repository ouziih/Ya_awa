<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'reference',
        'checkout_token',
        'delivery_zone_id',
        'zone_name',
        'address',
        'fullfillment_mode',
        'note',
        'sub_total',
        'discount_percentage',
        'discount_amount',
        'delivery_fee',
        'total',
        'statut',
        'stock_applied',
        'stock_restored',
        'canceled_at',
    ];

    protected $casts = [
        'sub_total' => 'integer',
        'discount_percentage' => 'integer',
        'discount_amount' => 'integer',
        'delivery_fee' => 'integer',
        'total' => 'integer',
        'stock_applied' => 'boolean',
        'stock_restored' => 'boolean',
        'canceled_at' => 'datetime',
        'statut' => OrderStatus::class,
    ];

    public function deliveryZone(): BelongsTo
    {
        return $this->belongsTo(DeliveryZone::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
