@extends('front.layouts.index')

@section('title','Документы')
@section('h1','Документы')

@if(Request::get('page'))
    @section('canonical')
        <link rel='canonical' href='https://oficeru.ru/doc'/>
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
        <div class="blog-list">
            @foreach ($docs as $doc)

                <div class="post clearfix">
                    <div class="entry-details" style="min-height: 70px">
                        <div class="entry-title" style="padding-left: 0px; ">
                            <h2 style="font-size: 20px;text-align: justify;">
                                <a href="/doc/{{ $doc->id }}" style="color: #21aabd"> {{   $doc->getShotName() }}</a>
                                @if(empty($doc->date_pod))
                                    <span class="mark yellow top" title="Не подписан" style="font-size: 12px;"><i
                                            class="the-icon fa fa-history"></i></span>
                                @elseif(empty($doc->date_pub)   )
                                    <span class="mark blue  top" title="Не опубликован" style="font-size: 12px;"><i
                                            class="the-icon fa fa-history"></i> </span>
                                @elseif($doc->date_pub->format('Y-m-d') > date('Y-m-d')  )
                                    <span class="mark blue  top"
                                          title="Будет опубликован {{$doc->date_pub->format('Y-m-d')}}"
                                          style="font-size: 12px;"><i class="the-icon fa fa-history"></i>  </span>
                                @elseif(empty($doc->date_vst))
                                    <span class="mark orange   top" title="Не вступил в силу"
                                          style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                @elseif($doc->date_vst->format('Y-m-d') == date('Y-m-d'))
                                    <span class="mark green    top" title="Сегодня вступил в силу"
                                          style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                @elseif($doc->date_vst->format('Y-m-d') > date('Y-m-d'))
                                    <span class="mark orange   top "
                                          title="Вступает в силу {{\Carbon\Carbon::parse($doc->date_vst)->isoFormat('Do MMMM YYYY')}} г."
                                          style="font-size: 12px;"> <i class="the-icon fa fa-history"></i> </span>
                                @elseif( !empty($doc->date_end_vst) && $doc->date_end_vst->format('Y-m-d') <= date('Y-m-d') )
                                    <span class="mark dark-gray   top"
                                          title="Утратил силу  {{\Carbon\Carbon::parse($doc->date_end_vst)->isoFormat('Do MMMM YYYY')}} г."
                                          style="font-size: 12px;"><i class="the-icon fa fa-history"></i></span>
                                @endif
                            </h2>
                            {{--<div class="entry-controls minimal">
                                <a href="#" class="control   " title="Добавить в избранное<br>-=Необходимо авторизоваться=-"> <i class="fa fa-heart-o"></i> </a><span class="control-tip">0</span>
                                <a href="#" class="control  " title="Нравится!<br>-=Необходимо авторизоваться=-"> <i class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">0</span>
                                <a href="#" class="control entry-comments" title="Комментарии"> <i class="fa fa-comments"></i> </a> <span class="control-tip">нет комментариев</span>
                                <div class="control"> <i class="fa fa-bar-chart"></i> </div> <span class="control-tip">233 просмотра </span>
                            </div>--}}
                            @if(!empty($doc->short_name))
                                <p>{!!   ' &laquo;'.$doc->short_name.'&raquo;'  !!} </p>
                            @endif

                        </div>
                    </div>

                    @if (($doc->tags->count()) )
                        <div class="keywords-index-list" style="margin-bottom: 0px">
                            <ul class="keywords">
                                @foreach ($doc->tags as $tag)
                                    <li><a href="/tag/{{ $tag->slug }}">{{ $tag->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

            @endforeach
            <div class="clear"></div>

        </div> <!-- .blog-list -->

        <!-- пейджинация -->
        {{ $docs->links('vendor.pagination.default') }}


    </div> <!-- .rw-row -->

@endsection




@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

