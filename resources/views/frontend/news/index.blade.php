@extends('frontend.layouts.index')
@section('title',$post->name)

@section('description',Str::ucfirst(Str::lower(str_replace("\r\n"," ",$post->meta_description))))

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
            <div style="text-align: justify">{!! Str::replace('<hr />', ' ', $post->text) !!}</div>
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
        </div>


        <div class="w-lg-65 mx-lg-auto">
            <!-- Card -->
            <div class="card bg-dark text-center my-4"
                 style="background-image: url('/assets/svg/components/wave-pattern-light.svg');">
                <div class="card-body">
                    <h4 class="text-white mb-4">Хотите подписаться на свежие статьи?</h4>

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
            <!-- End Card -->


            <!-- End Row -->
        </div>
        <div class="container content-space-1 content-space-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>3 comments</h2>
            </div>
            <!-- End Heading -->

            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Comment -->
                    <ul class="list-comment">
                        <!-- Item -->

                        <!-- End Item -->
                        @foreach ($post->comments as $comment)
                            <li class="list-comment-item">
                                <!-- Media -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-circle" src="./assets/img/160x160/img8.jpg"
                                             alt="Image Description">
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6>Hanna Wolfe</h6>
                                            <span class="d-block small text-muted">2 days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Media -->

                                <p>{{$comment->content}}</p>


                            </li>
                        @endforeach
                        <!-- Item -->

                        <!-- End Item -->
                    </ul>
                    <!-- End Comment -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        <div class="container content-space-b-2">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>Post a comment</h2>
            </div>
            <!-- End Heading -->

            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card card-lg border shadow-none">
                        <div class="card-body">
                            <form action="/comments/store" method="POST">
                                @csrf
                                <div class="d-grid gap-4">
                                    <!-- Form -->
                                    <input type="hidden" name="commentable_id" value="630">
                                    <input type="hidden" name="commentable_type" value="App\Models\Post">
                                    <!-- End Form -->


                                    <!-- End Form -->

                                    <!-- Form -->
                                    <span class="d-block">
                    <label class="form-label" for="blogContactsFormComment">Comment</label>
                    <textarea class="form-control form-control-lg"
                              name="content"
                              rows="5">234234233</textarea>
                  </span>
                                    <!-- End Form -->

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Article Description -->

@endsection



