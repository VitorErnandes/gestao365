<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'brand',
        'ean',
        'measurement_unit_id',
        'products_group_id',
        'purchase_price',
        'sale_price',
        'stock_quantity',
        'minimum_stock',
        'image',
        'status',
        'observation'
    ];
}
