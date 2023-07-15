@extends('frontend.layouts.post')
@section('title',$post->name)
@section('h1',$post->name)
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

@section('content')
    <main id="content" role="main">
        <!-- Article Description -->
        <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
            <div class="w-lg-65 mx-lg-auto">
                <div class="mb-4">
                    <h1 class="h2">{{$post->name}}</h1>
                </div>

                <div class="row align-items-sm-center mb-5">
                    <div class="col-sm-7 mb-4 mb-sm-0">
                        <!-- Media -->
                        <div class="d-flex align-items-center">


                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0">
                                    <a class="text-dark" href="">Администратор</a>
                                </h5>
                                <span class="d-block small">1 day ago</span>
                            </div>
                        </div>
                        <!-- End Media -->
                    </div>
                    <!-- End Col -->


                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <p>{!! Str::replace('<hr />', ' ', $post->text) !!}</p>
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
                                <div class="col-12">
                                    <a class="text-cap" href="#">Статьи</a>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="./blog-article.html">Better is when everything works
                                            together</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

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

        <!-- Subscribe -->
        <div class="container content-space-2 content-space-b-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>Stay in the know</h2>
                <p>Get special offers on the latest developments from Space.</p>
            </div>
            <!-- End Heading -->

            <div class="text-center mx-auto" style="max-width: 32rem;">
                <form>
                    <!-- Input Card -->
                    <div class="input-card input-card-sm border mb-5">
                        <div class="input-card-form">
                            <input type="text" class="form-control" placeholder="Your email" aria-label="Your email">
                        </div>
                        <button type="button" class="btn btn-primary">Subscribe</button>
                    </div>
                    <!-- End Input Card -->
                </form>

                <a class="link" href="./page-login.html">Create a free account <i
                        class="bi-chevron-right small ms-1"></i></a>
            </div>
        </div>
        <!-- End Subscribe -->
    </main>

@endsection



