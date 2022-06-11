<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pickup_orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_member_id',
        'customer_name',
        'experience_center',
        'date'
    ];
}
