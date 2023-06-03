<main id="content" role="main">
    <div class="bg-dark" style="background-image: url(/assets/svg/components/wave-pattern-light.svg);">
        <div class="container py-4">
            <div class="w-lg-75 mx-lg-auto">
                <h1 class="display-4 text-white" >Новости</h1>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="w-lg-75 mx-lg-auto">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="../demo-help-desk/index.html">Главная</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Новости</li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->
        </div>
    </div>

    <!-- Card Grid -->
    <div class="container  ">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8 mb-10 mb-lg-0">
                @yield('content')

            </div>
            <!-- End Col -->

            <div class="col-lg-3">
                @yield('widgets')
                <!-- Sticky Block Start Point -->
                <div id="stickyBlockStartPoint"></div>

                <div class="js-sticky-block"
                     data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "targetSelector": "#header",
                 "breakpoint": "md",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 80
               }'>


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
    <!-- End Card Grid -->
</main>
