<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable = [
        'order_id',
        'user_id',
        'address',
        'address2',
        'city',
        'country',
        'zip_code',
        'phone',
        'company_name',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
