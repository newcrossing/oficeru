@extends('frontend.layouts.auth')

@section('title','Регистрация')
@section('description','Авторизация на сайте')

@section('page-styles')
@endsection

@section('content')
    <!-- Form -->
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark"
                style="background-image: url('/assets/svg/components/wave-pattern-light.svg');">
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
                        <h1 class="h2">Авторизация</h1>
                        <p>Вход в аккаунт</p>
                    </div>
                    <!-- End Heading -->
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <div> {!! $error !!}</div>
                            @endforeach
                        </div>
                    @endif
                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation"
                          novalidate>
                        @csrf
                        <!-- Form -->
                        <div class="mb-3">
                            <label value="{{ old('name') }}" class="form-label" for="signupModalFormSignupEmail"
                                   autofocus>Ваш
                                email</label>
                            <input type="email" value="{{ old('email') }}" class="form-control form-control-lg"
                                   name="email" id="signupModalFormSignupEmail" placeholder="email@site.com" required>
                            <span class="invalid-feedback">Укажите корректный email адрес.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupPassword">Пароль</label>

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
                                пароль</label>

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
                        <!-- End Form -->

                        <!-- Check -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="signupHeroFormPrivacyCheck"
                                   name="signupFormPrivacyCheck">
                            <label class="form-check-label small" for="signupHeroFormPrivacyCheck"> Получать уведомления
                                о новых документах.</label>

                        </div>
                        <!-- End Check -->
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    ↻
                                </button>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control" placeholder="Введите капчу"
                                   name="captcha">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
                        </div>

                        <div class="text-center">
                            <p>Уже имеете акаунт? <a class="link" href="{{route('login')}}">Войти</a></p>
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

@section('page-scripts')
    @parent
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script type="text/javascript">
        let rel = document.getElementById('reload');
        rel.onclick = function (event) {
            fetch('reload-captcha')
                .then(
                    function (response) {
                        if (response.status !== 200) {
                            console.log('Ошибочка: ' + response.status);
                            return;
                        }

                        response.json().then(function (data) {
                            document.querySelector('.captcha span').innerHTML = data.captcha;
                        });
                    }
                )
                .catch(function (err) {
                    console.log('Fetch Error :-S', err);
                });
        };

        // $('#reload').click(function () {
        //     $.ajax({
        //         type: 'GET',
        //         url: 'reload-captcha',
        //         success: function (data) {
        //             $(".captcha span").html(data.captcha);
        //         }
        //     });
        // });

    </script>
@endsection


