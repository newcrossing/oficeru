@extends('frontend.layouts.index')
@section('title',$post->name)

@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('content')
    <!-- Article Description -->
    <div class="container content-space-t-1  content-space-b-2">
        <div class="w-lg-65 mx-lg-auto">

            <div class="mb-4">
                <h1 class="h2">{{$post->name}}</h1>
            </div>
            <div class="row align-items-sm-center mb-5">
                <div class="col-sm-7 mb-4 mb-sm-0">
                    <!-- Media -->
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ">
                           <span
                                class="d-block small"> <i class="bi bi-calendar2-date"></i> {{ \Carbon\Carbon::parse($post->date_public)->isoFormat('D MMMM Y', 'Do MMMM')}}</span>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            <p>{!! Str::replace('<hr />', ' ', $post->text) !!}</p>
        </div>

        <div class="w-lg-65 mx-lg-auto">
            <!-- Card -->
            <div class="card bg-dark text-center my-4"
                 style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
                <div class="card-body">
                    <h4 class="text-white mb-4">Хотите подписаться на свежие статьи?</h4>

                    <div class="w-lg-75 mx-lg-auto">
                        <form>
                            <!-- Input Card -->
                            <div class="input-card input-card-sm border">
                                <div class="input-card-form">
                                    <label for="subscribeForm" class="form-label visually-hidden">Укажите email</label>
                                    <input type="text" class="form-control" id="subscribeForm"
                                           placeholder="Введите email"
                                           aria-label="Enter email">
                                </div>
                                <button type="button" class="btn btn-primary">Подписаться</button>
                            </div>
                            <!-- End Input Card -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            @if($post->tags->count())
                <!-- Badges -->
                <div class="mt-0">
                    @foreach ($post->tags as $tag)
                        <a class="btn btn-soft-secondary btn-xs m-1"
                           href="/tag/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                </div>
                <!-- End Badges -->
            @endif
            <!-- End Row -->
        </div>
    </div>
    <!-- End Article Description -->




@endsection



