@extends('frontend.layouts.index')

@section('title','Личная страница / Основные настройки')
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
                    <!-- Card -->
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Основная информация</h4>
                            </div>
                            @if(!Auth::user()->email_verified_at)
                                <div class="alert alert-soft-danger text-center card-alert" role="alert">
                                    Email не подтвержден. <a class="alert-link"
                                                             href={{route('verification_email.send')}}>Отправить ссылку
                                        активации заново</a>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success ms-3 me-3 mt-3" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger ms-3 me-3 mt-3" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label form-label">Фото профиля</label>

                                    <div class="col-sm-9">
                                        <!-- Media -->
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                                <img id="avatarImg" class="avatar-img"
                                                     src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}">
                                            </label>

                                            <div class="d-grid d-sm-flex gap-2 ms-4">
                                                <div class="form-attachment-btn btn btn-primary btn-sm">Загрузить фото
                                                    <input type="file" class="js-file-attach form-attachment-btn-label"
                                                           id="avatarUploader" name="image"
                                                           data-hs-file-attach-options='{
                                      "textTarget": "#avatarImg",
                                      "mode": "image",
                                      "targetAttr": "src",
                                      "resetTarget": ".js-file-attach-reset-img",
                                      "resetImg": "/assets/img/160x160/img1.jpg",
                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
                                                </div>
                                                <!-- End Avatar -->

                                                <button type="submit" name="reset_foto" value="1"
                                                        class="btn btn-white btn-sm">Удалить
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Имя
                                        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="Отображается в комментариях, форумах и прочем."></i>
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="firstNameLabel"
                                                   placeholder="Имя" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="emailLabel" disabled
                                               placeholder="clarice@example.com" aria-label="clarice@example.com"
                                               value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label form-label">Пол</label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-md-down-break">
                                            <!-- Radio Check -->
                                            <label class="form-control" for="genderTypeRadio1">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="sex" value="1"
                                   {{ (Auth::user()->sex === '1') ? 'checked':''}} id="genderTypeRadio1">
                            <span class="form-check-label">М</span>
                          </span>
                                            </label>
                                            <!-- End Radio Check -->

                                            <!-- Radio Check -->
                                            <label class="form-control" for="genderTypeRadio2">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="sex" value="0"
                                   {{ (Auth::user()->sex === '0') ? 'checked':''}} id="genderTypeRadio2"
                            >
                            <span class="form-check-label">Ж</span>
                          </span>
                                            </label>
                                            <!-- End Radio Check -->

                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->


                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer pt-0">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->

                        <div class="card mt-6">
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Изменить пароль </h4>
                            </div>


                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="currentPasswordLabel" class="col-sm-3 col-form-label form-label">
                                        Новый пароль
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password"
                                                   id="currentPasswordLabel" placeholder="Новый пароль">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="currentPasswordLabel2" class="col-sm-3 col-form-label form-label">
                                        Повторите новый пароль
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   id="currentPasswordLabel2" placeholder="Повторите новый пароль">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- End Body -->


                            <!-- Footer -->
                            <div class="card-footer pt-0">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-success">Изменить</button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </form>

                    <!-- Card -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">Удалить акаунт</h4>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <p class="card-text">Полное удаление акаунта </p>

                            <div class="mb-4">
                                <!-- Check -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="deleteAccountCheckbox">
                                    <label class="form-check-label" for="deleteAccountCheckbox">Подтвердите что вы
                                        хотите удалить акаунт</label>
                                </div>
                                <!-- End Check -->
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </div>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
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
    <script src="/assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
@endsection



