<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    use HasFactory;

    protected $table = 'measurement_unit';

    protected $fillable = [
        'description',
        'status',
    ];
}
