@extends('frontend.layouts.auth')

@section('title','Авторизация')
@section('description','Авторизация на сайте')

@section('page-styles')
@endsection

@section('content')
    <!-- Form -->
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark"
                style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
                <div class="flex-grow-1 p-5">
                    <!-- Blockquote -->
                    <figure class="text-center">

                        <blockquote class="blockquote blockquote-light">
                            “Никогда не презирайте вашего неприятеля, каков
                            бы он ни был, и хорошо узнавайте его оружие, его образ действовать и сражаться. Знай в чем
                            его сила и в чем слабость врага.”
                        </blockquote>

                        <figcaption class="blockquote-footer blockquote-light">
                            <div class="mb-3">
                                <img class="avatar avatar-circle" src="/assets/img/160x160/suvorov.jpg">
                            </div>
                            А.Суворов
                        </figcaption>
                    </figure>
                    <!-- End Blockquote -->

                </div>
            </div>
            <!-- End Col -->

            <div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                    <!-- Heading -->
                    <div class="text-center mb-5 mb-md-7">
                        <h1 class="h2">Сброс пароля</h1>
                        <p>Придумайте новый пароль</p>
                    </div>
                    <!-- End Heading -->
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {!! $error !!}
                            @endforeach
                        </div>
                    @endif
                    <!-- Form -->
                    <form class="js-validate needs-validation" novalidate action="{{ route('pass.update') }}"
                          method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="token" value="{{$token}}">

                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupPassword">Новый пароль</label>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                       name="password" id="signupModalFormSignupPassword"
                                       placeholder="6+ символов" aria-label="6+ символов" required
                                       data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                             "defaultClass": "bi-eye-slash",
                             "showClass": "bi-eye",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                           }'>
                                <a class="js-toggle-password-target-1 input-group-append input-group-text"
                                   href="javascript:;">
                                    <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                                </a>
                            </div>
                            <span class="invalid-feedback">Ваш пароль некорректен, повторите снова.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupConfirmPassword"> Повторите
                                новый пароль</label>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                       name="password_confirmation" id="signupModalFormSignupConfirmPassword"
                                       placeholder="6+ символов" aria-label="6+ символов" required
                                       data-hs-validation-equal-field="#signupModalFormSignupPassword"
                                       data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                         }'>
                                <a class="js-toggle-password-target-2 input-group-append input-group-text"
                                   href="javascript:;">
                                    <i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
                                </a>
                            </div>
                            <span class="invalid-feedback">Пароли должны совпадать</span>
                        </div>


                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Сбросить</button>
                        </div>


                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Form -->

@endsection



