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
                                               href="{{ $doc->getLinkURL() }}">{{ $doc->getShotName() }}</a>
                                            @if(empty($doc->date_pod))
                                                <sup><span class="badge bg-secondary">Не подписан</span></sup>
                                            @elseif(empty($doc->date_pub))
                                                <sup><span class="badge bg-warning">Не опубликован</span></sup>
                                            @elseif($doc->date_pub->format('Y-m-d') > date('Y-m-d')  )
                                                <sup><span class="badge bg-warning">Не опубликован</span></sup>
                                            @elseif(empty($doc->date_vst))
                                                <sup><span class="badge bg-info">Не вступил в силу</span></sup>
                                            @elseif($doc->date_vst->format('Y-m-d') == date('Y-m-d'))
                                                <sup><span class="badge bg-success">Сегодня вступил в силу</span></sup>
                                            @elseif($doc->date_vst->format('Y-m-d') > date('Y-m-d'))
                                                <sup><span class="badge bg-info">Вступает в силу {{\Carbon\Carbon::parse($doc->date_vst)->isoFormat('Do MMMM YYYY')}} г.</span></sup>
                                            @elseif( !empty($doc->date_end_vst) && $doc->date_end_vst->format('Y-m-d') <= date('Y-m-d') )
                                                <span class="badge bg-danger">Утратил силу</span>
                                            @endif
                                        </h3>
                                        @if(!empty($doc->short_name))
                                            <p class="card-text" style="text-align: justify">
                                                {!!   ' &laquo;'.$doc->short_name.'&raquo;'  !!}
                                            </p>
                                        @endif
                                        <!-- Card Footer -->
                                        <!-- End Card Footer -->
                                    </div>
                                    <!-- End Card Body -->
                                </div>
                                <!-- End Col -->
                            </div>
                            @if($doc->tags->count())
                                <div class="mt-0">
                                    @foreach ($doc->tags as $tag)
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


                <!-- пейджинация -->
                {{ $docs->links('vendor.pagination.default') }}

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

