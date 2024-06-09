@extends('backend.layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Главная')
{{-- vendor scripts --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/adm/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/widgets.css')}}">
@endsection
@section('content')
    <section id="basic-button-icons">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Buttons with Icon -->
                                    <a href="{{ route('doc.create') }}" class="btn  btn-outline-primary mr-1 mb-1"><i
                                            class="bx bxs-plus-square"></i><span
                                            class="align-middle ml-25">Документ</span></a>
                                    <a href="{{ route('post.create') }}" class="btn  btn-outline-primary mr-1 mb-1"><i
                                            class="bx bxs-plus-square"></i><span
                                            class="align-middle ml-25">Статья / Новость</span></a>
                                    <a href="{{ route('tag.create') }}" class="btn  btn-outline-primary mr-1 mb-1"><i
                                            class="bx bxs-plus-square"></i><span
                                            class="align-middle ml-25">Тег</span></a>
                                    <a href="/log-viewer" class="btn  btn-outline-primary mr-1 mb-1"><i
                                            class="bx bxs-widget"></i><span
                                            class="align-middle ml-25">Логи</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Widgets Statistics start -->
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-2 col-12 dashboard-users-success">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bx-user-check font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">
                                <a href="{{ route('user.index') }}"> Активные</a>
                            </div>
                            <h3 class="mb-0">{{$user['verif']}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-12 dashboard-users-success">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bxs-calendar-check font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Задачи</div>
                            <h3 class="mb-0">{{$job['jobs']}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-12 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bxs-calendar-x font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Неудачные задачи</div>
                            <h3 class="mb-0">{{$job['failed_jobs']}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-12 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg  mx-auto mb-50">
                                <i class="bx bxs-file font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">
                                <a href="/admin/doc"> Документы</a>
                            </div>
                            <h3 class="mb-0">{{$docs['all']}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-12 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg  mx-auto mb-50">
                                <i class="bx bxs-book-content font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">
                                <a href="{{ route('post.index') }}"> Статьи</a>
                            </div>
                            <h3 class="mb-0">{{$posts}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-12 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg  mx-auto mb-50">
                                <i class="bx bxs-book-content font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">
                                <a href="{{ route('post.index') }}"> Новости</a>
                            </div>
                            <h3 class="mb-0">{{$news}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Widgets Statistics End -->

    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Действия посетителей</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Действие</th>
                                        <th>Пользователь</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td style="width: 50%"
                                                class=" text-{{($log->result!='info')?$log->result:''}} ">
                                                {!! $log->subject!!}
                                            </td>
                                            <td>
                                                {{$log->user_login}}
                                            </td>
                                            <td>
                                                {{$log->created_at->format('H:i  d.m.Y ')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->

@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/adm/app-assets/js/scripts/cards/widgets.js')}}"></script>
@endsection
