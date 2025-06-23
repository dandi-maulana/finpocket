<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'withdraw',
        'deposit'
    ];

    protected $casts = [
        'withdraw' => 'integer',
        'deposit' => 'integer'
    ];
    
}
