<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Step
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Step newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Step newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Step onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Step query()
 * @method static \Illuminate\Database\Eloquent\Builder|Step withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Step withoutTrashed()
 * @mixin \Eloquent
 */
class Step extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'text',
        'number',
        'image',
        'active',
    ];
}
