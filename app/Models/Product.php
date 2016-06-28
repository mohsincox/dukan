<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'unit_id',
        'quantity',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
    return $this->belongsTo(Unit::class);
    }
}
