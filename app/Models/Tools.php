<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tools
 *
 * @property int $id
 * @property string $name
 * @property string $stock
 * @property string $stock_min
 * @property string $stock_max
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tools newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tools newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tools query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereStockMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereStockMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tools whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
