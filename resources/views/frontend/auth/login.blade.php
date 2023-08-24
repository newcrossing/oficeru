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
                                <img class="avatar avatar-circle" src="./assets/img/160x160/suvorov.jpg">
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
                        <h1 class="h2">Авторизация</h1>
                        <p>Вход в аккаунт</p>
                    </div>
                    <!-- End Heading -->

                    <!-- Form -->
                    <form class="js-validate needs-validation" novalidate {{ route('login') }} method="POST">
                        @csrf
                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label" for="signupModalFormLoginEmail">Ваш email</label>
                            <input type="email" class="form-control form-control-lg" name="email"
                                   id="signupModalFormLoginEmail" placeholder="email@site.com"
                                   aria-label="email@site.com" required>
                            <span class="invalid-feedback">Укажите корректный email</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label" for="signupModalFormLoginPassword">Пароль</label>
                                <a class="form-label-link" href="{{route('password.update')}}">Забыли пароль?</a>
                            </div>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                       name="password" id="signupModalFormLoginPassword"
                                       placeholder="6+ символов" aria-label="8+ символов" required
                                       minlength="6"
                                       data-hs-toggle-password-options='{
                         "target": "#changePassTarget",
                         "defaultClass": "bi-eye-slash",
                         "showClass": "bi-eye",
                         "classChangeTarget": "#changePassIcon"
                       }'>
                                <a id="changePassTarget" class="input-group-append input-group-text"
                                   href="javascript:;">
                                    <i id="changePassIcon" class="bi-eye"></i>
                                </a>
                            </div>

                            <span class="invalid-feedback">Укажите корректный пароль.</span>
                        </div>
                        <!-- End Form -->

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Войти</button>
                        </div>

                        <div class="text-center">
                            <p>Не имеете аккаунта? <a class="link" href="{{route('register')}}">Регистрация </a></p>
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



