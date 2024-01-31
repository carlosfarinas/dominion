<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ProductPersonnel
 *
 * @property int $product_personnel_id
 * @property int $personnel_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel whereProductPersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPersonnel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
