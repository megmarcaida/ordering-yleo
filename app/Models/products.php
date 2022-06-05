<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_sku',
        'product_name',
        'product_description',
        'product_category',
        'product_price',
        'product_qty',
        'product_unit',
        'with_limit_qty',
        'er',
        'qo',
        'points'
    ];
}
