<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

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
