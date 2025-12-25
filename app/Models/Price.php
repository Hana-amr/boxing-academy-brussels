<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'target_group',
        'period',
        'subscription_price',
        'insurance_price',
        'card_price',
    ];
}
