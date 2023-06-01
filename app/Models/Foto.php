<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Foto
 *
 * @property-read \App\Models\Board|null $board
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto withoutTrashed()
 * @mixin \Eloquent
 */
class Foto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'file',
    ];


    /**
     * Связь  связь  с таблицей Board
     * Многое к одному.
     * Получает пользователя
     *
     * @return BelongsTo
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
