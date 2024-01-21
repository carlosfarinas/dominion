<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'stock_min',
        'stock_max'];

    public function personnel(): BelongsToMany
    {
        return $this->belongsToMany(Personnel::class,'personnel', 'product_id', 'personnel_id');
    }

}
