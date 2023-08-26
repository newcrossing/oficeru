@extends('frontend.layouts.index')

@section('title','Личная страница / Уведомления ')
@section('description','')

@section('page-styles')
@endsection

@section('content')
    <!-- Breadcrumb -->
    @include('frontend.profile.user_breadcrumb')
    <!-- End Breadcrumb -->

    <!-- Content -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                @include('frontend.profile.user_menu')
                <!-- End Navbar -->
            </div>
            <!-- End Col -->


            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <form action="{{route('profile.notification.update')}}" method="post">
                        @csrf
                        <!-- Card -->
                        <div class="card card-sm">

                            <!-- Header -->
                            <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                <h5 class="card-header-title">Уведомления</h5>

                                <a id="toggleAll1" class="js-toggle-state btn btn-white btn-sm btn-toggle"
                                   href="javascript:;"
                                   data-hs-toggle-state-options='{
                     "targetSelector": "#accountNotificationSwitch1, #accountNotificationSwitch2, #accountNotificationSwitch3, #accountNotificationSwitch4"
                   }'>
                                    <span class="btn-toggle-default">Включить все</span>
                                    <span class="btn-toggle-toggled">Отключить все</span>
                                </a>
                            </div>
                            <!-- End Header -->
                            @if(!Auth::user()->email_verified_at)
                                <div class="alert alert-soft-danger text-center card-alert" role="alert">
                                    Email не подтвержден. Уведомления неактивны.
                                    <a class="alert-link" href="{{route('verification_email.send')}}"
                                       target="_blank">Отправить ссылку активации заново</a>
                                </div>
                            @endif
                            <!-- Alert -->
                            @if(session('success'))
                                <div class="alert alert-success ms-3 me-3 mt-3" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="card-body">
                                <small class="card-subtitle">Отправлять мне:</small>

                                <!-- List Group -->
                                <div class="list-group list-group-flush list-group-no-gutters">
                                    <!-- Item -->
                                    <div class="list-group-item">
                                        <!-- Form Switch -->
                                        <label class="form-check form-switch" for="accountNotificationSwitch1">
                                            <input class="form-check-input mt-0" type="checkbox" name="notify_doc"
                                                   id="accountNotificationSwitch1" {{ (Auth::user()->notify_doc)?'checked':'' }}>
                                            <span class="d-block">Новые документы</span>
                                            <span class="d-block small text-muted">Ежедневно. При появлении на сайте новых документов касаемо военной службы.</span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                    <!-- End Item -->

                                    <!-- Item -->
                                    <div class="list-group-item">
                                        <!-- Form Switch -->
                                        <label class="form-check form-switch" for="accountNotificationSwitch2">
                                            <input class="form-check-input mt-0" type="checkbox" name="notify_vst"
                                                   id="accountNotificationSwitch2" {{ (Auth::user()->notify_vst)?'checked':'' }}>
                                            <span class="d-block">Документы вступающие в силу <span
                                                    class="badge bg-success ms-1">Новое</span></span>
                                            <span
                                                class="d-block small text-muted">В день вступления в силу документа.</span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                    <!-- End Item -->

                                    <!-- Item -->
                                    <div class="list-group-item">
                                        <!-- Form Switch -->
                                        <label class="form-check form-switch" for="accountNotificationSwitch3">
                                            <input class="form-check-input mt-0" type="checkbox" name="notify_edit"
                                                   id="accountNotificationSwitch3"
                                                {{ (Auth::user()->notify_edit)?'checked':'' }}>
                                            <span class="d-block">Измененные документы<span
                                                    class="badge bg-success ms-1">Новое</span></span>
                                            <span class="d-block small text-muted">В день изменения документа.</span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                    <!-- End Item -->

                                </div>
                                <!-- End List Group -->
                            </div>

                            <div class="card-footer pt-0">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </form>

                </div>
            </div>
            <!-- End Col -->
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
    <script src="/assets/vendor/hs-toggle-state/dist/hs-toggle-state.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        (function () {
            // INITIALIZATION OF TOGGLE STATE
            // =======================================================
            new HSToggleState('.js-toggle-state')
        })()
    </script>
@endsection



