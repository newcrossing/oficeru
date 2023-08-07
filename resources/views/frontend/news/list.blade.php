@extends('frontend.layouts.index')

@section('title', $breadcrumbs[1]['name'])
@section('h1',$breadcrumbs[1]['name'])

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')
    {{ Widget::run('subscribe') }}
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

@section('content')
    <div class="container content-space-t-1 content-space-b-2 content-space-b-lg-3">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8 mb-10 mb-lg-0">
                <div class="d-grid gap-7 mb-7">
                    <!-- Card -->
                    @foreach ($posts as $post)
                        <!-- Card -->
                        <div class="card card-flush card-stretched-vertical">
                            <div class="row">
                                <!-- End Col -->
                                <div class="col-sm-12">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="mb-2">
                                            @if($post->type == 'post')
                                                <a class="card-link" href="/post/">Статьи</a>
                                            @elseif($post->type == 'news')
                                                <a class="card-link" href="/news/">Новости</a>
                                            @endif
                                        </div>
                                        <h3 class="card-title">
                                            <a class="text-dark" href="{{ $post->getLinkURL() }}">{{ $post->name }}</a>
                                        </h3>
                                        <div class="card-footer">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 ">
                                                    <p class="card-text small">{{ \Carbon\Carbon::parse($post->date_public)->isoFormat('D MMMM Y', 'Do MMMM')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text" style="text-align: justify">
                                            {!!   strip_tags(Illuminate\Support\Str::before( $post->text,'<hr />'),'<img>')   !!}
                                        </p>
                                        <!-- Card Footer -->
                                        <!-- End Card Footer -->
                                    </div>
                                    <!-- End Card Body -->
                                </div>
                                <!-- End Col -->
                            </div>
                            @if($post->tags->count())
                                <div class="mt-0">
                                    @foreach ($post->tags as $tag)
                                        <a class="btn btn-soft-secondary btn-xs m-1"
                                           href="/tag/{{$tag->slug}}">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            @endif
                            <!-- End Row -->
                        </div>
                        <!-- End Card -->
                    @endforeach
                    <!-- End Card -->
                </div>

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-left small"></i>
                  </span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-right small"></i>
                  </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->
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

    <!-- пейджинация -->
    {{ $posts->links('vendor.pagination.default') }}

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

