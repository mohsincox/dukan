<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price',
        'cash'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
