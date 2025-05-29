<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_categories',
        'slug',
        'product_image',
        'short_description',
        'price',
        'quantity',
        'description',
        'product_tags',

    ];


    // app/Models/Product.php
public function galleries()
{
    return $this->hasMany(ProductGallery::class);
}

// size

    public function sizes(){
    return $this->hasMany(ProductSize::class);
    }

//color

public function colors(){

    return $this->hasMany(ProductColor::class);
}

// price
// In Product.php
public function price()
{
    return $this->hasOne(Pricing::class, 'product_id');
}

// attributes
public function attributes()
{
    return $this->hasMany(Attribute::class);
}
public function images()
{
    return $this->hasMany(ProductImage::class, 'product_id');
}

}
