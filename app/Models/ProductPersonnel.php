<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPersonnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'product_id'
    ];

    protected $primaryKey = 'product_personnel_id';

    protected $table = 'products_personnel';

//    /**
//     * @return BelongsTo
//     */
//    public function product(): BelongsTo
//    {
//        return $this->belongsTo(Products::class, 'product_id', 'product_id');
//    }
//
//    /**
//     * @return BelongsTo
//     */
//    public function personnel(): BelongsTo
//    {
//        return $this->belongsTo(Personnel::class,'personnel_id','personnel_id');
//    }


}
