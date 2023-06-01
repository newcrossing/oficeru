<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * App\Models\Document
 *
 * @property int $id ид контента
 * @property int|null $lavel_id ид раздела
 * @property int|null $user_id
 * @property string|null $preamble_name чей  документ
 * @property string|null $nomer номер для документа
 * @property string|null $short_name короткое название для документа
 * @property string $name название контента
 * @property string|null $description описание контента
 * @property string|null $annotation примечание
 * @property string|null $text текст контент
 * @property \Illuminate\Support\Carbon|null $date_pod дата подписания документа
 * @property \Illuminate\Support\Carbon|null $date_pub дата публикации
 * @property \Illuminate\Support\Carbon|null $date_vst дата вступления в силу
 * @property \Illuminate\Support\Carbon|null $date_end_vst дата окончания действия
 * @property \Illuminate\Support\Carbon|null $date_npub начало публикации
 * @property \Illuminate\Support\Carbon|null $date_kpub конец публикации
 * @property int $pub публикация
 * @property string|null $meta_title заголовок
 * @property string|null $meta_key ключевые слова
 * @property string|null $meta_disc мета описание
 * @property int|null $hits хиты
 * @property int|null $position
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags тег
 * @property int|null $type тип контента
 * @property bool|null $notify включить уведомление
 * @property bool|null $in_main на главную
 * @property int|null $num_download
 * @property mixed|null $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Izm|null $izm
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Document searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereAnnotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDateEndVst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDateKpub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDateNpub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDatePod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDatePub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDateVst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereInMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereLavelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereMetaDisc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNumDownload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document wherePreambleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document wherePub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 * @mixin \Eloquent
 */
class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SearchableTrait;

    protected $fillable = [
        'name',
        'preamble_name',
        'nomer',
        'short_name',
        // 'text', убрал что бы можно было сохранять редакции
        'description',
        'annotation',
        'date_pod',
        'date_pub',
        'date_vst',
        'date_end_vst',
        'date_npub',
        'date_kpub',
        'pub',
        'notify',
        'in_main',
        'meta_disc'
    ];
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'documents.name' => 10,
            'documents.text' => 7,

        ]
    ];


    public function setDateNull($date1 = '')
    {
        if (empty($date1)) {
            return null;
        } else {
            return \Carbon\Carbon::createFromFormat('d/m/Y', $date1)->format('Y-m-d');
        }
    }

    /**
     * Возвращает краткое название документа
     * @return string
     */
    public function getNameDoc()
    {
        $name = '';
        $name .= $this->preamble_name ?? '';
        if (!empty($this->date_sign)) {
            Carbon::setLocale('ru');
            $Carbone = Carbon::now()->locale('ru_RU');
            $name .= ' от ' . $Carbone->createFromFormat('Y-m-d', $this->date_sign)->isoFormat('D MMMM YYYY',
                    'Do MMMM') . ' г.';
        }
        $name .= $this->short_name ? ' &laquo;' . $this->short_name . '&raquo;' : '';
        return $name;
    }

    public function getShotName()
    {
        if (empty($this->preamble_name)) {
            return $this->name;
        }
        $name = $this->preamble_name;
        $name .= (!empty($this->nomer)) ? ' №' . $this->nomer : '';
        $name .= (!empty($this->date_pod)) ? ' от ' . $this->date_pod->translatedFormat('j F Y') . ' г.' : '';

        return $name;
    }


    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'date_pod',
        'date_pub',
        'date_vst',
        'date_end_vst',
        'date_npub',
        'date_kpub'
    ];

    protected $casts = [
        'notify' => 'boolean',
        'in_main' => 'boolean',
    ];

    public function setDatePodAttribute($value)
    {
        $this->attributes['date_pod'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDatePubAttribute($value)
    {
        $this->attributes['date_pub'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDateVstAttribute($value)
    {
        $this->attributes['date_vst'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDateEndVstAttribute($value)
    {
        $this->attributes['date_end_vst'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDateNpubAttribute($value)
    {
        $this->attributes['date_npub'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDateKpubAttribute($value)
    {
        $this->attributes['date_kpub'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setPubAttribute($value)
    {
        $this->attributes['pub'] = empty($value) ? 0 : 1;
    }

    public function setNotifyAttribute($value)
    {
        $this->attributes['notify'] = empty($value) ? 0 : 1;
    }

    public function setInMainAttribute($value)
    {
        $this->attributes['in_main'] = empty($value) ? 0 : 1;
    }

    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    /**
     * Полиморфная  связь  с таблицей Tags
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function izm()
    {
        return $this->hasOne(Izm::class);
    }

}
