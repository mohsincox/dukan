<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
