<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'name_category',
        'category_balance'
    ];

    protected $casts = [
        'category_balance' => 'integer',
    ];
    
}
