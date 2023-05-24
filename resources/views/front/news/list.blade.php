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
                <div class="post clearfix">
                    <div class="entry-details" style="min-height: 70px">
                        <div class="entry-title" style="padding-left: 0px; ">
                            <h2 style="font-size: 20px;text-align: justify;">
                                <a href="/news/{{ $post->id }}" style="color: #21aabd"> {{   $post->name }}</a>
                            </h2>
                            <p style="text-align: justify">{!!   strip_tags(Illuminate\Support\Str::before( $post->text,'<hr />'),'<img>')   !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="clear"></div>
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

