@extends('frontend.layouts.index')

@section('title',$doc->getShotName())
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$doc->name))))

@section('page-styles')
    <link rel="stylesheet" href="/assets/css/my.css">
@endsection
@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
    {{ Widget::run('subscribe') }}
@endsection
@section('content')
    <div class="container content-space-t-1 content-space-b-2 content-space-b-lg-3">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8 mb-10 mb-lg-0">
                @if(!empty($doc->annotation))
                    <div class="alert alert-info" role="alert">
                        {{ $doc->annotation }}
                    </div>
                @endempty
                @isset($messageTop)
                    <div class="alert alert-warning" role="alert">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-exclamation-triangle-fill"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                Информация: {!!$messageTop!!}
                            </div>
                        </div>
                    </div>
                @endisset
                <div class="row align-items-sm-center mb-5">
                    <div class="col-sm-7 mb-4 mb-sm-0">

                    </div>
                    <!-- End Col -->

                    <div class="col-sm-5">
                        <div class="d-flex justify-content-sm-end align-items-center">
                            <div class="d-flex gap-2">
                                <a class="text-secondary"  href="/pdf/{{$doc->id}}">Скачать <i class="bi bi-file-earmark-pdf-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <div class="d-grid document" style="display:  block!important;">
                    {!! $curText   !!}
                </div>
                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>

                @if($doc->tags->count())
                    <!-- Badges -->
                    <div class="mt-0">
                        @foreach ($doc->tags as $tag)
                            <a class="btn btn-soft-secondary btn-xs m-1"
                               href="/tag/{{$tag->slug}}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <!-- End Badges -->
                @endif

                <div class="card bg-dark text-center my-10"
                     style="background-image: url('/assets/svg/components/wave-pattern-light.svg');">
                    <div class="card-body">
                        <h4 class="text-white mb-4">Хотите подписаться на свежие документы?</h4>

                        <div class="w-lg-75 mx-lg-auto">
                            <form action="{{ route('subscribe.create') }}" method="post">
                                @csrf
                                <!-- Input Card -->
                                <div class="input-card input-card-sm border">
                                    <div class="input-card-form">
                                        <label for="subscribeForm" class="form-label visually-hidden">Укажите
                                            email</label>
                                        <input type="email" name="email" class="form-control" id="subscribeForm"
                                               placeholder="Введите email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Подписаться</button>
                                </div>
                                <!-- End Input Card -->
                            </form>
                        </div>
                    </div>
                </div>


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



