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
        <div class="blog-list">
        @foreach ($posts as $post)
            <!-- Entry -->
                <div class="post clearfix">
                    <div class="entry-details">
                        <div class="entry-date">
                            <span class="date">{{ $post->date_public->format('d')}}</span>
                            <span class="month">{{ \Carbon\Carbon::parse($post->date_public)->isoFormat(' MMMM ', 'Do MMMM')}}</span>
                            <span class="year">{{ $post->date_public->format('Y')}}</span>
                        </div>
                        <div class="entry-title"><h2><a href="/news/{{ $post->id }}">{{   $post->name }}</a></h2></div>
                        <div class="entry-content" style="text-align: justify">
                            {!!   strip_tags(Illuminate\Support\Str::before( $post->text,'<hr />'),'<img>')   !!}
                        </div>
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

