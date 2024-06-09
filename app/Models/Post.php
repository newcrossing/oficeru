<?php

namespace App\Models;

use App\Traits\HasComments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $lavel_id
 * @property string|null $type Тип
 * @property string $name Название статьи
 * @property string|null $text
 * @property int|null $pub
 * @property int|null $hits
 * @property bool $notify
 * @property int $status
 * @property string|null $meta_description
 * @property string|null $meta_title
 * @property bool $in_main
 * @property \Illuminate\Support\Carbon|null $date_public
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Izm|null $izm
 * @property-write mixed $date_pod
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Post searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDatePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereInMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLavelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereNotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SearchableTrait;
    use HasComments;

    protected $fillable = [
        'name',
        'text',
        'description',
        'annotation',
        'date_public',
        'type',
        'pub',
        'notify',
        'in_main',
        'meta_description'
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
    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'date_public',

    ];
    protected $casts = [
        'notify' => 'boolean',
        'in_main' => 'boolean',
    ];

    public function setDateNull($date1 = '')
    {
        if (empty($date1)) {
            return null;
        } else {
            return \Carbon\Carbon::createFromFormat('d/m/Y', $date1)->format('Y-m-d');
        }
    }

    public function setDatePublicAttribute($value)
    {
        $this->attributes['date_public'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDatePodAttribute($value)
    {
        $this->attributes['date_pod'] = (empty($value)) ? null : \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
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


    /**
     * Получение ссылки на материал
     * @return string
     */
    public function getLinkURL()
    {
        if ($this->type == 'news') {
            return '/news/' . $this->id;
        } elseif ($this->type == 'post'){
            return '/post/' . $this->id;
        }
    }

    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    /**
     * Полиморфная связь с таблицей Tags
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
