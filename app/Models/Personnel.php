<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Personnel
 *
 * @property int $personnel_id
 * @property string $name
 * @property int $responsibility_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Responsibilities|null $responsibility
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereResponsibilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
