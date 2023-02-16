@extends('front.layouts.index')
@section('title',$post->name)
@section('h1',$post->name)
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('widgets')
    {{ Widget::run('search') }}

@endsection
@section('content')
    <div class="rw-row">
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
@endsection



