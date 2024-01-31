<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Responsibilities
 *
 * @property int $responsibility_id
 * @property string $responsibility
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities whereResponsibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities whereResponsibilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsibilities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Responsibilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsibility'];

    protected $table = 'responsibilities';
    protected $primaryKey = 'responsibility_id';
}
