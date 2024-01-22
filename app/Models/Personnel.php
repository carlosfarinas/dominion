<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'responsibility_id'];

    protected $table = 'personnel';

    protected $primaryKey = 'personnel_id';

//    public function products(): BelongsToMany
//    {
//        return $this->belongsToMany(Products::class,'products_personnel', 'personnel_id', 'product_id');
//    }


    /**
     * @return belongsToMany
     */
    public function products(): belongsToMany
    {
        return $this->belongsToMany(Products::class, 'products_personnel', 'personnel_id', 'product_id', 'personnel_id', 'product_id');
    }

    /**
     * @return BelongsTo
     */
    public function responsibility(): BelongsTo
    {
        return $this->belongsTo(Responsibilities::class, 'responsibility_id', 'personnel_id');
    }




}
