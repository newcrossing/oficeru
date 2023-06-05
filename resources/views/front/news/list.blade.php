@extends('front.layouts.index')

@section('title','Новости')
@section('h1','Новости')

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
            @foreach ($posts as $post)
                <!-- Entry -->
                <div class="recipe clearfix" style="padding-right: 0px; padding-left: 0px">
                    <div class="recipe-main-info clearfix">
                        <div class="grid-container">
                            <div class="grid desk-12 omega">
                                <div class="entry-title">
                                    <h2><a href="/news/{{ $post->id }}">{{   $post->name }}</a></h2>
                                </div>
                                <div class="entry-controls minimal">
                                    <div class="control"><i class="fa fa-calendar"></i></div>
                                    <span class="control-tip">
                                        {{ \Carbon\Carbon::parse($post->date_public)->isoFormat('d MMMM Y', 'Do MMMM')}}
                                    </span>
                                    <div class="control"><i class="fa fa-bar-chart"></i></div>
                                    <span class="control-tip">{{ $post->hits }} просмотров</span>
                                </div>
                                <div class="entry-content">
                                    <p style="text-align: justify">
                                        {!!   strip_tags(Illuminate\Support\Str::before( $post->text,'<hr />'),'<img>')   !!}
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div> <!-- .grid-container -->
                    </div>
                </div> <!-- .entry -->
                <div class="clear"></div>
            @endforeach
        </div>
        <!-- пейджинация -->
        {{ $posts->links('vendor.pagination.default') }}

    </div>
@endsection




@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

