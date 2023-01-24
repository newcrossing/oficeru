@extends('frontend.layouts.index')

@section('title',$agreement->name )

@section('vendor-styles')

@endsection

@section('page-styles')
@endsection


@section('content')
    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">{!! $agreement->name  !!}</h3>

                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- START SHAPE -->
    <div class="position-relative" style="z-index: 1">
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                <path fill="#FFFFFF" fill-opacity="1"
                      d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <!-- END SHAPE -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    {!! $agreement->text !!}
                </div>
            </div>
        </div>
    </section>


@endsection






@section('vendor-scripts')
@endsection


@section('page-scripts')
@endsection

