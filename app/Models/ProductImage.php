<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images'; // Adjust if your table is named differently

    protected $fillable = [
        'product_id',
        'image_url', // or whatever column holds the image URL/path
    ];

    public $timestamps = false; // If your table does not have created_at and updated_at

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
