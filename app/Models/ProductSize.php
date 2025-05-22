<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    // table name
    protected $table = 'product_sizes';
    // fillable fields
    protected $fillable = [
        'product_id',
        'size',
    ];
    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
