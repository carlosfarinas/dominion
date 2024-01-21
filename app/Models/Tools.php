<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'stock_min',
        'stock_max'
    ];

}
