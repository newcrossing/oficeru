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

        <!-- Комментрии -->
        <div class="container content-space-1 content-space-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>
                    @if($post->comments->count())
                        {{$post->comments->count()}}  {{trans_choice('комментарий|комментария|комментариев',$post->comments->count())   }}
                    @else
                        Комментариев пока нет
                    @endif
                </h2>
            </div>
            <!-- End Heading -->

            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Comment -->
                    <ul class="list-comment">
                        <!-- End Item -->
                        @foreach ($post->comments->sortBy('created_at') as $comment)
                            <li class="list-comment-item">
                                <!-- Media -->
                                <a name="comment{{$comment->id}}"></a>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-circle"
                                             src="{{ Storage::url('/avatars/300/'.$comment->user->getFoto()) }}">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6>
                                                {{$comment->user->getName()}}
                                                @auth()
                                                    @if(Auth::user()->id == $comment->user->id)
                                                        <span class="badge bg-success">Я</span>
                                                    @endif
                                                @endauth
                                            </h6>
                                            <span class="d-block small text-muted">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Media -->
                                <p>{!! ($comment->content) !!}</p>
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
                <h2>Написать комментарий</h2>
            </div>
            <!-- End Heading -->
            @guest()
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card card-lg border shadow-none">
                            <div class="card-body">
                                Оставлять комментрии могут лишь зарегистрированные пользователи
                                <div>
                                    <a href="{{route('login')}}"> войти</a> /
                                    <a href="{{route('register')}}"> зарегистрироваться</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
            @endguest
            @auth()

                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card card-lg border shadow-none">
                            <div class="card-body">
                                <form action="/comments/store" method="POST">
                                    @csrf
                                    <div class="d-grid gap-4">
                                        <!-- Form -->
                                        <input type="hidden" name="commentable_id" value="{{$post->id}}">
                                        <input type="hidden" name="commentable_type" value="Post">
                                        <!-- End Form -->
                                        <span class="d-block">
                    <label class="form-label" for="blogContactsFormComment">Комментарий</label>
                  <div class="quill-custom">
                      <textarea class="form-control form-control-lg js-quill2" style="height: 100px"
                                id="editor1"
                                name="content"
                                rows="5"></textarea></div>

                  </span>


                                        <!-- End Form -->

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">Отпривить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
            @endauth

            <!-- End Row -->
        </div>
    </div>
    <!-- End Article Description -->

@endsection
@section('page-scripts')
    <script type="text/javascript" src="/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        if (typeof CKEDITOR == 'undefined') {
            document.write('Error');
        } else {
            var editor = CKEDITOR.replace('editor1',
                {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink'],
                        ['Maximize']
                    ]
                });

        }
    </script>
@endsection


