<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * App\Models\Board
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Foto> $fotos
 * @property-read int|null $fotos_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder|Board withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Board withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Foto> $fotos
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Foto> $fotos
 * @mixin \Eloquent
 */
class Board extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date_public'];

    /**
     * Связь  связь  с таблицей Users
     * Один к одному.
     * Получает пользователя
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     *Генерирует qr ссылку
     */
    public static function generateQr($id = '00000')
    {
        return 'qr-' . rand(1000, 9999) . $id. Str::lower(Str::random(5));
    }

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Связь с таблицей
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

}
