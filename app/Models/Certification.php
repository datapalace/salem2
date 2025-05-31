<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //
    protected $table = 'certifications';
    protected $fillable = [
        'product_id',
        'certification',
        
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
