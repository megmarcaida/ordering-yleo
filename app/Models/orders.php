<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_member_id',
        'customer_name',
        'customer_pin',
        'order_type',
        'payment_method',
        'remarks',
        'total_price',
        'total_qty'
    ];
}
