@extends('frontend.layouts.index')

@section('title', $breadcrumbs[1]['name'])
@section('h1',$breadcrumbs[1]['name'])

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
    {{ Widget::run('subscribe') }}
@endsection

@section('content')
    <div class="container content-space-t-1 content-space-b- content-space-b-lg-2">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8 mb-10 mb-lg-0">
                <div class="d-grid gap-7 mb-7">
                    <!-- Card -->
                    @foreach ($docs as $doc)
                        <!-- Card -->
                        <div class="card card-flush card-stretched-vertical">
                            <div class="row">
                                <!-- End Col -->
                                <div class="col-sm-12">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <a class="card-link" href="/doc/">Документы</a>
                                        </div>
                                        <h3 class="card-title">
                                            <a class="text-dark"
                                               href="/doc/{{$doc->getId()}} "> {{$doc->name}}</a>
                                        </h3>

                                        <!-- Card Footer -->
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

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

