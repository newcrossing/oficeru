<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Content
 *
 * @property int $id ид контента
 * @property int|null $IdRazdel_Content ид раздела
 * @property int|null $IdKateg_Content ид категории
 * @property string|null $PreambleName_Content чей  документ
 * @property string|null $Nomer_Content номер для документа
 * @property string|null $ShortName_Content короткое название для документа
 * @property string $Name_Content название контента
 * @property string|null $Description_Content описание контента
 * @property string|null $Annotation_Content примечание
 * @property string|null $Text_Content текст контент
 * @property string|null $DatePod_Content дата подписания документа
 * @property string|null $DatePub_Content дата публикации
 * @property string|null $DateVst_Content дата вступления в силу
 * @property string|null $DateEndVst_Content дата окончания действия
 * @property string|null $DateNPub_Content начало публикации
 * @property string|null $DateKPub_Content конец публикации
 * @property string $Pub_Content публикация
 * @property string|null $Date_Content дата добавления
 * @property string|null $Time_Content время добавления
 * @property string|null $MetaTitle_Content заголовок
 * @property string|null $MetaKey_Content ключевые слова
 * @property string|null $MetaDisc_Content мета описание
 * @property int|null $Hits_Content хиты
 * @property int|null $Position_Content
 * @property string|null $Tags_Content тег
 * @property int|null $Type_Content тип контента
 * @property string|null $Uvedom_Content включить уведомление
 * @property string|null $UvedomStatus_Content статус уведомления
 * @property string|null $InMain_Content на главную
 * @property string|null $DateTime_Content
 * @property int $NumDownload_Content
 * @property string|null $DocPost_Content
 * @property int|null $IdUser_Content
 * @property mixed|null $Status_Content
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereAnnotationContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateEndVstContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateKPubContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateNPubContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDatePodContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDatePubContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateTimeContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDateVstContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDescriptionContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDocPostContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereHitsContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIdKategContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIdRazdelContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIdUserContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereInMainContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereMetaDiscContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereMetaKeyContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereMetaTitleContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereNameContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereNomerContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereNumDownloadContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content wherePositionContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content wherePreambleNameContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content wherePubContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereShortNameContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereStatusContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTagsContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTextContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTimeContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTypeContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUvedomContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUvedomStatusContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Content withoutTrashed()
 * @mixin \Eloquent
 */
class Content extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * ничего не защищать
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',

    ];
}
