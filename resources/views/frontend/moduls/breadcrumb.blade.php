<div class="navbar-dark bg-dark" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
    <div class="container content-space-1 " >
        <div class="row align-items-center">
            <div class="col">
                @hasSection('h1')
                    <div class="d-none d-lg-block">
                        <h1 class="h2 text-white"> @yield('h1')</h1>
                    </div>
                @endif
                @isset($breadcrumbs)
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light mb-0">
                            @foreach ($breadcrumbs as $breadcrumb)
                                @if(isset($breadcrumb['link']))
                                    <li class="breadcrumb-item">
                                        <a href="{{asset($breadcrumb['link'])}}"> {{$breadcrumb['name']}} </a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{$breadcrumb['name']}}</li>
                                @endif
                            @endforeach

                        </ol>
                    </nav>
                @endisset
                <!-- End Breadcrumb -->

            </div>
            <!-- End Col -->
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- Breadcrumb -->
<!-- End Breadcrumb -->
<!-- Breadcrumb -->
{{--@isset($breadcrumbs)--}}
{{--    <div class="container py-5">--}}
{{--        <div class="w-lg-75 ">--}}
{{--            <!-- Breadcrumb -->--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    @foreach ($breadcrumbs as $breadcrumb)--}}
{{--                        @if(isset($breadcrumb['link']))--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="{{asset($breadcrumb['link'])}}"> {{$breadcrumb['name']}} </a>--}}
{{--                            </li>--}}
{{--                        @else--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb['name']}}</li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <!-- End Breadcrumb -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endisset--}}
<!-- End Breadcrumb -->
