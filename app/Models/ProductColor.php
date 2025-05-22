<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    // Table name
    protected $table = 'product_colors';
    // Fillable fields
    protected $fillable = [
        'product_id',
        'color',
        
    ];

    // define relationship

   public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
