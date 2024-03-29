<!DOCTYPE html>
<html lang="en" dir="" class="h-100">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title','Главная') / Офицеру.ру</title>

    <!-- Favicon -->
    @include('front.moduls.favicon')

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css">
    @yield('vendor-styles')
    @yield('page-styles')
</head>

<body class="d-flex align-items-center min-h-100">
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
    <div class="container-fluid">
        <nav class="navbar-nav-wrap">
            <!-- White Logo -->
            <a class="navbar-brand d-none d-lg-flex" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/img/logo.png" alt="Logo">
            </a>
            <!-- End White Logo -->

            <!-- Default Logo -->
            <a class="navbar-brand d-flex d-lg-none" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/img/logo.png" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <div class="ms-auto">
                <a class="link link-sm link-secondary" href="/">
                    <i class="bi-chevron-left small ms-1"></i> Назад
                </a>
            </div>
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark"
                style="background-image: url('/assets/svg/components/wave-pattern-light.svg');">
                <div class="flex-grow-1 p-5">
                    <!-- Blockquote -->
                    <figure class="text-center">

                        <blockquote class="blockquote blockquote-light">“Никогда не презирайте вашего неприятеля, каков
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
                        <h1 class="h2">Здравствуйте</h1>
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
                                <a class="form-label-link" href="./page-reset-password.html">Забыли пароль?</a>
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
                            <button type="submit" class="btn btn-primary btn-lg">Войти </button>
                        </div>

                        <div class="text-center">
                            <p>Не имеете аккаунта? <a class="link" href="./page-signup.html">Регистрация </a></p>
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
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>

<!-- JS Front -->
<script src="/assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function () {
        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            // onSubmit: data => {
            //     data.event.preventDefault()
            //     // alert('Submited')
            // }
        })


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')
    })()
</script>
</body>
</html>
