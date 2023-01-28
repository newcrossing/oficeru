<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'preamble_name',
        'nomer',
        'short_name',
        'text',
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
}
