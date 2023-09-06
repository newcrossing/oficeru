@extends('frontend.layouts.index')

@section('title', 'Главная')
@section('h1','')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection



@section('content')

    <!-- Hero -->
    <div class="container content-space-t-1 content-space-t-lg-1 content-space-b-1 content-space-b-lg-1">
        <!-- Search -->
        <div class="mb-4">
            <form method="get" action="/s/">
                <!-- Input Card -->
                <div class="input-card border">
                    <div class="input-card-form">
                        <div class="input-group input-group-merge">
          <span class="input-group-prepend input-group-text">
            <i class="bi-search"></i>
          </span>
                            <input type="text" name="s" class="form-control" id="searchAppsForm"
                                   placeholder="Что ищем?" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi-arrow-right"></i>
                    </button>
                </div>
                <!-- End Input Card -->
            </form>
        </div>
        <!-- End Search -->
        <div class="row justify-content-lg-between align-items-lg-center mb-10">
            <div class="col-md-6 col-lg-5">
                <!-- Heading -->
                <div class="mb-5">
                    <h1>Правовая поддержка военнослужащих</h1>
                    <p>Предоставляем подборку правовых актов для мобилизованных граждан. Так же формируется база
                        документов для военнослужащих контрактной службы. Рекомендуем опробывать калькулятор физо
                        военнослужащих (по нашему мнению лучший). Находится в разделе #Сервисы</p>
                </div>
                <!-- End Title & Description -->

                <div class="d-grid d-sm-flex gap-3">
                    <a class="btn btn-primary btn-transition" href="#">Документы</a>
                </div>


            </div>
            <!-- End Col -->

            <div class="col-sm-7 col-md-6 d-none d-md-block">
                <img class="img-fluid" src="/assets-/placeholder/mil.jpg" alt="Image Description">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Hero -->
    <!-- Hero -->

    <div class="container content-space-t-0 content-space-t-lg-0 content-space-b-2 position-relative zi-2">
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-3 mb-md-3">
            <h1>Сервисы</h1>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <!-- Card -->
                <a class="card card-transition text-center h-100" href="https://fizo.oficeru.ru/">
                    <div class="card-body">
                        <div class="svg-icon text-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-calculator" viewBox="0 0 16 16">
                                <path
                                    d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                <path
                                    d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
                            </svg>
                        </div>

                        <h4 class="card-title">Онлайн калькулятор <br> (до 1 сентября 2023)</h4>
                        <p class="card-text text-body">
                            По физической подготовке Военнослужащим Минобороны.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <span class="card-link">Перейти в калькулятор
                            <i class="bi-chevron-right small ms-1"></i>
                        </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <!-- Card -->
                <a class="card card-transition text-center h-100" href="https://fizo2023.oficeru.ru/">
                    <div class="card-body">
                        <div class="svg-icon text-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-calculator" viewBox="0 0 16 16">
                                <path
                                    d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                <path
                                    d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
                            </svg>
                        </div>

                        <h4 class="card-title">Онлайн калькулятор <br>(с 1 сентября 2023)</h4>
                        <p class="card-text text-body">
                            По физической подготовке Военнослужащим Минобороны.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <span class="card-link">Перейти в калькулятор
                            <i class="bi-chevron-right small ms-1"></i>
                        </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-md-4 mb-3 mb-md-0">
                <!-- Card -->
                <a class="card card-transition text-center h-100" href="https://vt4.oficeru.ru/">
                    <div class="card-body">
                        <div class="svg-icon text-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z"/>
                            </svg>
                        </div>
                        <h4 class="card-title">Онлайн калькулятор</h4>
                        <p class="card-text text-body"> по военному многоборью (ВТ-4) военнослужащих</p>
                    </div>

                    <div class="card-footer pt-0">
                        <span class="card-link">Перейти в калькулятор ВТ-4<i
                                class="bi-chevron-right small ms-1"></i></span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Hero -->

    <!-- Icon Blocks -->
    <div class="container">
        <div class="border-bottom content-space-1 content-space-lg-1">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2 class="text-info">Актуальные документы на сегодня</h2>
            </div>
            <!-- End Heading -->
            <div class="row">
                @foreach ($inMainDoc as $doc)
                    <div class="col-sm-6 col-md-4 mb-3 ">
                        <!-- Icon Blocks -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span>—</span>
                            </div>
                            <div class="flex-grow-1 ms-3"><span class="legend-indicator bg-success"></span>
                                <a href="{{route('document.single',$doc->id)}}" class="h4">
                                    {{$doc->getShotName()}}</a>
                                <p>{{ Str::limit( $doc->short_name , 150)  }}</p>
                            </div>
                        </div>
                        <!-- End Icon Blocks -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Icon Blocks -->
    <div class="row justify-content-lg-center mt-3">

        <div class="col-md-6 col-lg-5 mb-3 mb-md-5 mb-lg-7">
            <h2 class="text-center mb-5">Свежие документы</h2>
            <!-- Icon Blocks -->
            @foreach ($freshPubDoc as $doc)
                <div class="d-flex pe-md-5">
                    <div class="flex-grow-1 ms-3">
                        <h5>{{$doc->getShotName()}}</h5>
                        <p class="justify-content-lg-center">{{ $doc->short_name }}  </p>
                    </div>
                </div>
            @endforeach
            <!-- End Icon Blocks -->
        </div>

        <div class="col-md-6 col-lg-5 mb-3 mb-md-5 mb-lg-7">
            <h2 class="text-center mb-5">Вступают в силу</h2>
            <!-- Icon Blocks -->
            @foreach ($freshVstDoc as $doc)
                <div class="d-flex pe-md-5">
                    <div class="flex-grow-1 ms-3">
                        <h5>{{$doc->getShotName()}}</h5>
                        <p class="justify-content-lg-center">{{ $doc->short_name }}  </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-100"></div>


    </div>
@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

