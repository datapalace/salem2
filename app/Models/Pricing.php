<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricing';
    protected $fillable = [
        'product_id',
        'single_list_price',

    ];
    // This model represents the pricing information for a product.

}
