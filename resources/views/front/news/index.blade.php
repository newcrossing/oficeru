@extends('front.layouts.index')
@section('title',$post->name)
@section('h1',$post->name)
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

@section('content')

    <div class="rw-row">
        <div class="entry-controls minimal">
            <div class="control"><i class="fa fa-calendar"></i></div>
            <span class="control-tip">
                {{ \Carbon\Carbon::parse($post->date_public)->isoFormat('d MMMM Y', 'Do MMMM')}}
            </span>
            <div class="control"><i class="fa fa-bar-chart"></i></div>
            <span class="control-tip">{{ $post->hits }} просмотров</span>
        </div>
        <div class="blog-single clearfix">
            <div class="entry post">
                <div class="entry-details">
                    <div class="post">
                        {!! Str::replace('<hr />', ' ', $post->text) !!}
                    </div>
                </div>
                <div class="clear"></div>
            </div> <!-- .entry -->
        </div>
        <div class="clear"></div>


    </div> <!-- .rw-row -->
    @if($post->tags->count())
        <div class="rw-row light border-tb">
            <div class="recipe-tags">
                <span class="tags-title">Метки:</span>
                @foreach ($post->tags as $tag)
                    <span class="tag"><a href="/tag/{{$tag->id}}">  {{$tag->name}}</a></span>

                @endforeach

            </div>
        </div>
    @endif

@endsection



