<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name',
        'category',
        'slug',
        'main_image',
        'sort_description',
        'price',
        'quantity',
        'ful_detail',
        'group_tag',
        'sizes',
        'colors'
    ];
    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];
    
    // app/Models/Product.php
public function galleries()
{
    return $this->hasMany(ProductGallery::class);
}

}
