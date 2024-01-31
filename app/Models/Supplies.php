<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Supplies
 *
 * @property int $supplies_id
 * @property string $description
 * @property string $stock
 * @property string $stock_min
 * @property string $stock_max
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereStockMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereStockMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereSuppliesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplies whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supplies extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'stock',
        'stock_min',
        'stock_max'
        ];

    protected $table = 'supplies';
    protected $primaryKey = 'supplies_id';
}
