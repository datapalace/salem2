<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'type',
        'slug',
        'body',
        'colourway_name',
        'customize',
        'size',
        'brand',

    ];


    // app/Models/Product.php
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }


    // size

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    //color

    public function colors()
    {

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
    public function relatedProducts()
    {
        return $this->hasMany(RelatedProduct::class, 'product_id');
    }
    // certifications
    public function certifications()
    {
        return $this->hasMany(Certification::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
