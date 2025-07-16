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
        'product_title',
        'unit_price',
        'embroidery_price',
        'total_price',
        'decoration_price',
        'custom_image',
        'custom_side',
        'ref',
        'track_id',
        'decoration_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
}
