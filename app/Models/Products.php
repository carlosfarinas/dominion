<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
