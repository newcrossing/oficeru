@extends('frontend.layouts.index')

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
    <div class="container content-space-t-1 content-space-b- content-space-b-lg-2">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8 mb-10 mb-lg-0">
                <div class="d-grid gap-7 mb-7">
                    <!-- Card -->
                    @foreach ($contents as $content)
                        @if(class_basename($content) == "Post")
                            <!-- Card -->
                            <div class="card card-flush card-stretched-vertical">
                                <div class="row">
                                    <!-- End Col -->
                                    <div class="col-sm-12">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="mb-2">
                                                @if($content->type == 'post')
                                                    <a class="card-link" href="/post/">Статьи</a>
                                                @elseif($content->type == 'news')
                                                    <a class="card-link" href="/news/">Новости</a>
                                                @endif
                                            </div>
                                            <h3 class="card-title">
                                                <a class="text-dark"
                                                   href="{{ $content->getLinkURL() }}">{{ $content->name }}</a>
                                            </h3>
                                            <div class="card-footer">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 ">
                                                        <p class="card-text small">{{ \Carbon\Carbon::parse($content->date_public)->isoFormat('D MMMM Y', 'Do MMMM')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text" style="text-align: justify">
                                                {!!   strip_tags(Illuminate\Support\Str::before( $content->text,'<hr />'),'<img>')   !!}
                                            </p>
                                            <!-- Card Footer -->
                                            <!-- End Card Footer -->
                                        </div>
                                        <!-- End Card Body -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                @if($content->tags->count())
                                    <div class="mt-0">
                                        @foreach ($content->tags as $tag)
                                            <a class="btn btn-soft-secondary btn-xs m-1"
                                               href="/tag/{{$tag->slug}}">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- End Row -->
                            </div>
                            <!-- End Card -->
                        @elseif(class_basename($content) == "Document")
                            <!-- Card -->
                            <div class="card card-flush card-stretched-vertical">
                                <div class="row">
                                    <!-- End Col -->
                                    <div class="col-sm-12">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <a class="card-link" href="/doc/">Документы</a>
                                            </div>
                                            <h3 class="card-title">
                                                <a class="text-dark"
                                                   href="{{ $content->getLinkURL() }}">{{ $content->getShotName() }}</a>
                                                @if(empty($content->date_pod))
                                                    <sup><span class="badge bg-secondary">Не подписан</span></sup>
                                                @elseif(empty($content->date_pub))
                                                    <sup><span class="badge bg-warning">Не опубликован</span></sup>
                                                @elseif($content->date_pub->format('Y-m-d') > date('Y-m-d')  )
                                                    <sup><span class="badge bg-warning">Не опубликован</span></sup>
                                                @elseif(empty($content->date_vst))
                                                    <sup><span class="badge bg-info">Не вступил в силу</span></sup>
                                                @elseif($content->date_vst->format('Y-m-d') == date('Y-m-d'))
                                                    <sup><span class="badge bg-success">Сегодня вступил в силу</span></sup>
                                                @elseif($content->date_vst->format('Y-m-d') > date('Y-m-d'))
                                                    <sup><span class="badge bg-info">Вступает в силу {{\Carbon\Carbon::parse($content->date_vst)->isoFormat('Do MMMM YYYY')}} г.</span></sup>
                                                @elseif( !empty($content->date_end_vst) && $content->date_end_vst->format('Y-m-d') <= date('Y-m-d') )
                                                    <span class="badge bg-danger">Утратил силу</span>
                                                @endif
                                            </h3>
                                            @if(!empty($content->short_name))
                                                <p class="card-text" style="text-align: justify">
                                                    {!!   ' &laquo;'.$content->short_name.'&raquo;'  !!}
                                                </p>
                                            @endif
                                            <!-- Card Footer -->
                                            <!-- End Card Footer -->
                                        </div>
                                        <!-- End Card Body -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                @if($content->tags->count())
                                    <div class="mt-0">
                                        @foreach ($content->tags as $tag)
                                            <a class="btn btn-soft-secondary btn-xs m-1"
                                               href="/tag/{{$tag->slug}}">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- End Row -->
                            </div>
                        @endif

                    @endforeach
                    <!-- End Card -->
                </div>

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>




            </div>
            <!-- End Col -->

            <div class="col-lg-3">
                @yield('widgets')
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>


    <!-- Sticky Block End Point -->
    <div id="stickyBlockEndPoint"></div>








@endsection




@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

