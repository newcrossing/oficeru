<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Social
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Social query()
 * @method static \Illuminate\Database\Eloquent\Builder|Social withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Social withoutTrashed()
 * @mixin \Eloquent
 */
class Social extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    //protected $guarded = [];
    protected $fillable = ['name', 'link', 'ico', 'active'];
}
