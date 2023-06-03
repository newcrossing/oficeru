@extends('frontend.layouts.index')

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
    <div class="d-grid gap-1 mb-7">
        @foreach ($posts as $post)
            <!-- Card -->
            <div class="card card-flush card-stretched-vertical">
                <div class="row">

                    <!-- End Col -->
                    <div class="col-sm-12">
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="mb-2">
                                <a class="card-link" href="#">Новости</a>
                            </div>

                            <h3 class="card-title">
                                <a class="text-dark" href="/news/{{ $post->id }}">{{   $post->name }}</a>
                            </h3>

                            <p class="card-text" style="text-align: justify">
                                {!!   strip_tags(Illuminate\Support\Str::before( $post->text,'<hr />'),'<img>')   !!}
                            </p>

                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <a class="avatar avatar-circle" href="./blog-author-profile.html">
                                            <img class="avatar-img" src="/assets/img/160x160/img3.jpg"
                                                 alt="Image Description">
                                        </a>
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <a class="card-link link-dark" href="#">Автор</a>
                                        <p class="card-text small">{{ \Carbon\Carbon::parse($post->date_public)->isoFormat('D MMMM Y', 'Do MMMM')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card Footer -->
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Card -->

        @endforeach

        <!-- End Card -->
    </div>

    <!-- Sticky Block End Point -->
    <div id="stickyBlockEndPoint"></div>

    <!-- пейджинация -->
    {{ $posts->links('vendor.pagination.default') }}

@endsection




@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

