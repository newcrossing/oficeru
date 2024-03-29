@extends('front.layouts.index')
@section('title',$doc->getShotName())
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$doc->name))))

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('info_doc', $doc->toArray()) }}
{{--    {{ Widget::run('subscribe_doc') }}  --}}
@endsection

@section('content')

    @if(!empty($doc->annotation))
        <blockquote>
            <span class="text-pink"> {{ $doc->annotation }}</span>
        </blockquote>
    @endempty

    @isset($messageTop)
        <h3 class="recipe-headlines footnotes">{!!$messageTop!!}</h3>
    @endisset


    <div class="rw-row">
        <div class="blog-single clearfix">
            <div class="entry post">
                <div class="entry-details">
                    <div class="document">
                        {!! $curText   !!}
                    </div>
                </div>
                <div class="clear"></div>
            </div> <!-- .entry -->
        </div>
        <div class="clear"></div>
    </div> <!-- .rw-row -->
    @if($doc->tags->count())
        <div class="rw-row light border-tb">
            <div class="recipe-tags">
{{--                <span class="tags-title">Метки:</span>--}}
                @foreach ($doc->tags as $tag)
                    <span class="tag"><a href="/tag/{{$tag->slug}}">  {{$tag->name}}</a></span>
                @endforeach

            </div>
        </div>
    @endif
@endsection



