<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FaqItem;

class FaqCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany(FaqItem::class);
    }
}
