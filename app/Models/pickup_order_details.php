<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pickup_order_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_order_id',
        'pin'
    ];
}
