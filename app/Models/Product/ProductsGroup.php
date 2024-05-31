<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsGroup extends Model
{
    use HasFactory;

    protected $table = 'products_group';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
