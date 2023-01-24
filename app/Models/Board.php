<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
