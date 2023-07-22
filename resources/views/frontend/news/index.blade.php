@extends('frontend.layouts.index')
@section('title',$post->name)

@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

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
                        <div class="flex-shrink-0">
                            <img class="avatar avatar-circle" src="./assets/img/160x160/img9.jpg"
                                 alt="Image Description">
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-0">
                                <a class="text-dark" href="./blog-author-profile.html">Christina Kray</a>
                            </h5>
                            <span class="d-block small">1 day ago</span>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>
                <!-- End Col -->

                <div class="col-sm-5">
                    <div class="d-flex justify-content-sm-end align-items-center">
                        <span class="text-cap mb-0 me-2">Share:</span>

                        <div class="d-flex gap-2">
                            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                <i class="bi-facebook"></i>
                            </a>
                            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                <i class="bi-twitter"></i>
                            </a>
                            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                <i class="bi-instagram"></i>
                            </a>
                            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                <i class="bi-telegram"></i>
                            </a>
                        </div>
                    </div>
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
                                    <input type="text" class="form-control" id="subscribeForm" placeholder="Введите email"
                                           aria-label="Enter email">
                                </div>
                                <button type="button" class="btn btn-primary">Подписаться </button>
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


    <!-- Card Grid -->
    <div class="container">
        <div class="w-lg-75 border-top content-space-2 mx-lg-auto">
            <!-- Heading -->
            <div class="mb-3 mb-sm-5">
                <h2>Популярные статьи</h2>
            </div>
            <!-- End Heading -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Card -->
                    <div class="border-bottom h-100 py-5">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <a class="text-cap" href="#">Product</a>
                                <h4 class="mb-0">
                                    <a class="text-dark" href="./blog-article.html">Better is when everything works
                                        together</a>
                                </h4>
                            </div>
                            <!-- End Col -->

                            <div class="col-5">
                                <img class="img-fluid rounded" src="./assets/img/500x280/img1.jpg"
                                     alt="Image Description">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <!-- Card -->
                    <div class="border-bottom h-100 py-5">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <a class="text-cap" href="#">Tech</a>
                                <h4 class="mb-0">
                                    <a class="text-dark" href="./blog-article.html">Should You Buy An Apple Pencil?</a>
                                </h4>
                            </div>
                            <!-- End Col -->

                            <div class="col-5">
                                <img class="img-fluid rounded" src="./assets/img/500x280/img3.jpg"
                                     alt="Image Description">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <!-- Card -->
                    <div class="border-bottom h-100 py-5">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <a class="text-cap" href="#">Product</a>
                                <h4 class="mb-0">
                                    <a class="text-dark" href="./blog-article.html">This Watch gym partnerships give you
                                        perks for working out</a>
                                </h4>
                            </div>
                            <!-- End Col -->

                            <div class="col-5">
                                <img class="img-fluid rounded" src="./assets/img/500x280/img5.jpg"
                                     alt="Image Description">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <!-- Card -->
                    <div class="border-bottom h-100 py-5">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <a class="text-cap" href="#">Tech</a>
                                <h4 class="mb-0">
                                    <a class="text-dark" href="./blog-article.html">Drone Company PrecisionHawk Names
                                        New CEO</a>
                                </h4>
                            </div>
                            <!-- End Col -->

                            <div class="col-5">
                                <img class="img-fluid rounded" src="./assets/img/500x280/img7.jpg"
                                     alt="Image Description">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Card Grid -->

@endsection



