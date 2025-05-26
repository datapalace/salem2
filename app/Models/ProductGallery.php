<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'images';
    protected $fillable = ['product_id', 'image_url', 'image_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
