<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SearchableTrait;

    protected $fillable = [
        'name',
        'text',
        'description',
        'annotation',

        'date_public',

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
