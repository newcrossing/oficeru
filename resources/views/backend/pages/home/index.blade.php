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
    <!-- Widgets Statistics start -->
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <h4>Пользователи </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                <i class="bx bx-user font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">
                                <a href="{{route('user.index')}}"> Всего пользователей</a>
                            </p>
                            <h2 class="mb-0">
                                {{$user['all']}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                                <i class="bx bx-user-check font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">
                                <a href="/admin/doc"> Активированные</a>
                            </p>
                            <h2 class="mb-0">{{$user['verif']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                <i class="bx bx-user-minus font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Не активированные </p>
                            <h2 class="mb-0">{{$user['noVerif']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Widgets Statistics End -->
    <!-- Widgets Statistics start -->
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-3 col-12 dashboard-users-success">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bx-list-ul font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Очередь</div>
                            <h3 class="mb-0">{{$job['jobs']}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-12 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bx-error-circle font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Неудачные задачи</div>
                            <h3 class="mb-0">{{$job['failed_jobs']}}</h3>
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
                                                class="@if($log->result== 'error') text-danger @endif ">
                                                {{$log->subject}}
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
