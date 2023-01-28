@extends('front.layouts.full')

@section('title','Главная')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')

@endsection

@section('content')
    <div class="rw-row subtle large home-recipe-of-the-day">
        <div class="grid-container">
            <div class="grid desk-6">
                <div class="entry-photo">
                    <div class="badge">Ужедневная подборка</div>
                    <img src="/assets/placeholder/mil.jpg"/>
                </div>
            </div>
            <div class="grid desk-6">
                <h3>Мобилизованным и контрактникам</h3>
                <p> Предоставляем подборку правовых актов для мобилизованных граждан. Так же формируется база документов для военнослужащих
                    контрактной службы. Рекомендуем опробывать
                    <a href="https://fizo.oficeru.ru/">калькулятор</a> физо военнослужащих (по нашему мнению лучший).
                    Находится в разделе #Сервисы</p>

                <div class="entry-meta clearfix">
                    <div class="meta favorites">
                        <span class="icon"><i class="the-icon fa fa-file-text-o"></i></span>
                        <span class="number">{{$countDoc}} документов</span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div class="rw-row subtle large ">

        <div class="grid-container">

            <div class="grid desk-6">
                <h4>Опубликованные</h4>
                @foreach ($freshPubDoc as $doc)
                    <div class="home-blog-post clearfix">
                        <div class="entry-date">
                            <div class="date">{{ $doc->date_pub->format('d')}}</div>
                            <div class="month">{{ \Carbon\Carbon::parse($doc->date_pub)->isoFormat(' MMMM ', 'Do MMMM')}}</div>

                        </div>
                        <div class="entry-details">
                            <div class="entry-title">
                                <a href="{{route('document.single',$doc->id)}}">{{$doc->getShotName()}}</a>
                            </div>
                            <div class="entry-content">{{ Str::limit( $doc->short_name , 400)  }}      </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid desk-6">
                <h4>Вступили в силу</h4>
                @foreach ($freshVstDoc as $doc)
                    <div class="home-blog-post clearfix">
                        <div class="entry-date">
                            <div class="date">{{ $doc->date_vst->format('d')}}</div>
                            <div class="month">{{ \Carbon\Carbon::parse($doc->date_vst)->isoFormat(' MMMM ', 'Do MMMM')}}</div>

                        </div>
                        <div class="entry-details">
                            <div class="entry-title">
                                <a href="{{route('document.single',$doc->id)}}">{{$doc->getShotName()}}</a>
                            </div>
                            <div class="entry-content">{{ Str::limit( $doc->short_name , 400)  }}      </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clear"></div>
        </div>

    </div> <!-- .rw-row -->

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection
