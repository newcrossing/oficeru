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
                    <div class="badge">Ежедневная подборка</div>
                    <img src="/assets/placeholder/mil.jpg"/>
                </div>
            </div>
            <div class="grid desk-6">
                <h3>Мобилизованным и контрактникам</h3>
                <p> Предоставляем подборку правовых актов для мобилизованных граждан. Так же формируется база документов
                    для военнослужащих
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
                            <div
                                class="month">{{ \Carbon\Carbon::parse($doc->date_pub)->isoFormat(' MMMM ', 'Do MMMM')}}</div>

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
                <h4>Вступают в силу</h4>
                @foreach ($freshVstDoc as $doc)
                    <div class="home-blog-post clearfix">
                        <div class="entry-date">
                            <div class="date">{{ $doc->date_vst->format('d')}}</div>
                            <div
                                class="month">{{ \Carbon\Carbon::parse($doc->date_vst)->isoFormat(' MMMM ', 'Do MMMM')}}</div>

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
            <div class="" style="text-align: center; margin-top: 20px">
                <span class="text-primary" style="font-size: 24px"> Хочу получать <strong>уведомления</strong> о новых документах</span><br>
                <span class="text-dark-gray" style="font-size: 14px"> Получение ежедневных уведомлений о
                    поступлении <br> новых документов в сфере военного законодательства.</span>
                <form action="{{ route('subscribe.create') }}" method="post">
                    @csrf
                    <div class="grid desk-12">
                        <input type="text" name="email" style="font-size: 22px" placeholder="Ваш e-mail" required>
                    </div>
                    <div class="grid desk-12">
                        <input type="submit" value="Подписаться" class="button primary">
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>

    </div> <!-- .rw-row -->

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection
