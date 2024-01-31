<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonnelResponsibilities
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PersonnelResponsibilities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonnelResponsibilities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonnelResponsibilities query()
 * @mixin \Eloquent
 */
class PersonnelResponsibilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsibility'];

}
