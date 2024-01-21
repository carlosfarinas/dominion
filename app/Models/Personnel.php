<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Products::class,'products', 'personnel_id', 'product_id');
    }


}
