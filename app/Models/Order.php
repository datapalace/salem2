<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'product_id',
        'user_id',
        'sizes',
        'custom_design',
        'custom_designs', // Add the new JSON field
        'product_title',
        'unit_price',
        'embroidery_price',
        'total_price',
        'decoration_price',
        'custom_image',
        'custom_side',
        'ref',
        'status',
        'track_id',
        'decoration_type'
    ];

    protected $casts = [
        'custom_designs' => 'array', // Automatically cast JSON to array
        'sizes' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    // product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
