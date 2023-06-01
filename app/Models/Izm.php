<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

/**
 * App\Models\Izm
 *
 * @property int $id
 * @property int|null $document_id кто вносит изменение
 * @property int|null $document_current_id во что вносят изменения
 * @property string|null $text текст нового документа
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Document|null $document
 * @method static \Illuminate\Database\Eloquent\Builder|Izm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Izm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Izm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Izm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereDocumentCurrentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Izm withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Izm withoutTrashed()
 * @mixin \Eloquent
 */
class Izm extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $fillable = [
        'text',
    ];


    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
    ];


    /**
     * Связь одно ко ОДНОму
     * @return mixed
     */
    public function document()
    {
        return $this->belongsTo(Document::class)->orderBy('date_vst');;
    }

}
