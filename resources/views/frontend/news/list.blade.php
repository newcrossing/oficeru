@extends('frontend.layouts.index')

@section('title','Новости')
@section('h1','Новости')



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


    <div class="container content-space-t-0 content-space-b-2 content-space-b-lg-3">
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
                                            <a class="card-link" href="#">Новости</a>
                                        </div>

                                        <h3 class="card-title">
                                            <a class="text-dark" href="/news/{{ $post->id }}">{{ $post->name }}</a>
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
                <div class="mb-7">
                    @yield('widgets')
                    <div class="mb-3">
                        <h3>Newsletter</h3>
                    </div>

                    <!-- Form -->
                    <form>
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Enter email" aria-label="Enter email">
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                    <!-- End Form -->

                    <p class="form-text">Get special offers on the latest developments from Front.</p>
                </div>

                <div class="mb-7">
                    <div class="mb-3">
                        <h3>Productivity</h3>
                    </div>

                    <!-- List Group -->
                    <ul class="list-group list-group-lg">
                        <!-- Item -->
                        <li class="list-group-item">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-1">Here's how to dodge distractions</h5>
                                        <p class="text-body small mb-0">Feb 08, 2020</p>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <i class="bi-chevron-right"></i>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-1">Ideas to stay productive</h5>
                                        <p class="text-body small mb-0">Feb 09, 2020</p>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <i class="bi-chevron-right"></i>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </a>
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-group-item">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-1">Classic design principles</h5>
                                        <p class="text-body small mb-0">Feb 10, 2020</p>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <i class="bi-chevron-right"></i>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </a>
                        </li>
                        <!-- End Item -->
                    </ul>
                    <!-- End List Group -->
                </div>

                <!-- Sticky Block Start Point -->
                <div id="stickyBlockStartPoint"></div>

                <div class="js-sticky-block" data-hs-sticky-block-options="{
                 &quot;parentSelector&quot;: &quot;#stickyBlockStartPoint&quot;,
                 &quot;targetSelector&quot;: &quot;#header&quot;,
                 &quot;breakpoint&quot;: &quot;md&quot;,
                 &quot;startPoint&quot;: &quot;#stickyBlockStartPoint&quot;,
                 &quot;endPoint&quot;: &quot;#stickyBlockEndPoint&quot;,
                 &quot;stickyOffsetTop&quot;: 80
               }">
                    <div class="mb-7">
                        <div class="mb-3">
                            <h3>Front culture</h3>
                        </div>

                        <div class="d-grid gap-2">
                            <!-- Card -->
                            <a class="d-block" href="./blog-article.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-lg">
                                            <img class="avatar-img" src="./assets/img/320x320/img1.jpg"
                                                 alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Announcing a free plan for small teams</h5>
                                    </div>
                                </div>
                            </a>
                            <!-- End Card -->

                            <!-- Card -->
                            <a class="d-block" href="./blog-article.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-lg">
                                            <img class="avatar-img" src="./assets/img/320x320/img10.jpg"
                                                 alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Mapping the first family tree for Front
                                            office</h5>
                                    </div>
                                </div>
                            </a>
                            <!-- End Card -->

                            <!-- Card -->
                            <a class="d-block" href="./blog-article.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-lg">
                                            <img class="avatar-img" src="./assets/img/320x320/img9.jpg"
                                                 alt="Image Description">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">Felling eyeing first major Classic win in
                                            2018</h5>
                                    </div>
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>
                    </div>

                    <div class="mb-7">
                        <div class="mb-3">
                            <h3>Tags</h3>
                        </div>

                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Business</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Adventure</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Community</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Announcements</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Tutorials</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Resources</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Classic</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Photography</a>
                        <a class="btn btn-soft-secondary btn-xs mb-1" href="#">Interview</a>
                    </div>
                </div>
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

