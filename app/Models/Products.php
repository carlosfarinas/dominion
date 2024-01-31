<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Products
 *
 * @property int $product_id
 * @property string $name
 * @property string $stock
 * @property string $stock_min
 * @property string $stock_max
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Personnel> $personnel
 * @property-read int|null $personnel_count
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereStockMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereStockMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'stock_min',
        'stock_max'];

    protected $table = 'products';
    protected $primaryKey = 'product_id';

//    public function personnel(): BelongsToMany
//    {
//        return $this->belongsToMany(Personnel::class,'products_personnel', 'product_id', 'personnel_id');
//    }

    /**
     * @return belongsToMany
     */
    public function personnel(): belongsToMany
    {
        return $this->belongsToMany(Personnel::class, 'products_personnel', 'product_id', 'personnel_id', 'product_id', 'personnel_id');
    }

}
