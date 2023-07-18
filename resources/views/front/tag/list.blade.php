@extends('front.layouts.index')

@section('title','Теги')
@section('h1',$tag->name)

@if(Request::get('page'))
    @section('canonical')
        <link rel='canonical' href='https://oficeru.ru/news'/>
    @endsection
@endif

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

@section('content')
    <div class="rw-row">
        <div class="recipes-list">
            @foreach ($contents as $content)
                <div class="recipe clearfix" style="padding-right: 0px; padding-left: 0px">
                    @if(class_basename($content) == "Post")
                        <!-- Entry -->
                        <div class="recipe-main-info clearfix">
                            <div class="grid desk-12 omega">
                                @if($content->type == 'post')
                                    <a href="/post/" style="margin-top: 20px"> <span
                                            class="text-olive"> <strong>Статья</strong></span></a>
                                @elseif($content->type == 'news')
                                    <a href="/news/" style="margin-top: 20px"> <span
                                            class="text-olive"> <strong>Новость</strong></span></a>
                                @endif
                                <div class="entry-title">
                                    @if($content->type == 'post')
                                        <h2>
                                            <a href="/post/{{ $content->id}}">{{   $content->name }}</a>
                                        </h2>
                                    @elseif($content->type == 'news')
                                        <h2>
                                            <a href="/news/{{ $content->id}}">{{   $content->name }}</a>
                                        </h2>
                                    @endif
                                </div>
                                <div class="entry-controls minimal">
                                    <div class="control"><i class="fa fa-calendar"></i></div>
                                    <span class="control-tip">
                                        {{ \Carbon\Carbon::parse($content->date_public)->isoFormat('d MMMM Y', 'Do MMMM')}}
                                    </span>
                                    <div class="control"><i class="fa fa-bar-chart"></i></div>
                                    <span class="control-tip">{{ $content->hits }} просмотров</span>
                                </div>
                                <div class="entry-content">
                                    <p style="text-align: justify">
                                        {!!   strip_tags(Illuminate\Support\Str::before( $content->text,'<hr />'),'<img>')   !!}
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    @elseif(class_basename($content) == "Document")
                        <div class="post clearfix">
                            <div class="entry-details" style="min-height: 70px; margin-top: 20px">
                                <div class="entry-title" style="padding-left: 0px; ">
                                    <a href="/doc/" style="margin-top: 20px"> <span
                                            class="text-olive"> <strong>Документ</strong></span></a>
                                    <h2 style="font-size: 20px;text-align: justify; margin-top: 5px">
                                        <a href="/doc/{{ $content->id }}"
                                           style="color: #21aabd"> {{   $content->getShotName() }}</a>
                                        @if(empty($content->date_pod))
                                            <span class="mark yellow top" title="Не подписан"
                                                  style="font-size: 12px;"><i
                                                    class="the-icon fa fa-history"></i></span>
                                        @elseif(empty($content->date_pub)   )
                                            <span class="mark blue  top" title="Не опубликован"
                                                  style="font-size: 12px;"><i
                                                    class="the-icon fa fa-history"></i> </span>
                                        @elseif($content->date_pub->format('Y-m-d') > date('Y-m-d')  )
                                            <span class="mark blue  top"
                                                  title="Будет опубликован {{$content->date_pub->format('Y-m-d')}}"
                                                  style="font-size: 12px;"><i
                                                    class="the-icon fa fa-history"></i>  </span>
                                        @elseif(empty($content->date_vst))
                                            <span class="mark orange   top" title="Не вступил в силу"
                                                  style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                        @elseif($content->date_vst->format('Y-m-d') == date('Y-m-d'))
                                            <span class="mark green    top" title="Сегодня вступил в силу"
                                                  style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                        @elseif($content->date_vst->format('Y-m-d') > date('Y-m-d'))
                                            <span class="mark orange   top "
                                                  title="Вступает в силу {{\Carbon\Carbon::parse($content->date_vst)->isoFormat('Do MMMM YYYY')}} г."
                                                  style="font-size: 12px;"> <i
                                                    class="the-icon fa fa-history"></i> </span>
                                        @elseif( !empty($content->date_end_vst) && $content->date_end_vst->format('Y-m-d') <= date('Y-m-d') )
                                            <span class="mark dark-gray   top"
                                                  title="Утратил силу  {{\Carbon\Carbon::parse($content->date_end_vst)->isoFormat('Do MMMM YYYY')}} г."
                                                  style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                        @endif
                                    </h2>
                                    @if(!empty($content->short_name))
                                        <p>{!!   ' &laquo;'.$content->short_name.'&raquo;'  !!} </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (($content->tags->count()) )
                        <div class="keywords-index-list" style="margin-bottom: 0px">
                            <ul class="keywords">
                                @foreach ($content->tags as $tag)
                                    <li><a href="/tag/{{ $tag->slug }}">{{ $tag->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="clear"></div>
            @endforeach
        </div>
        <!-- пейджинация -->
        {{--        {{ $tag->links('vendor.pagination.default') }}--}}

    </div>
@endsection




@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

