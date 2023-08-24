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
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">
    @yield('vendor-styles')
    @yield('page-styles')
</head>

<body class="d-flex align-items-center min-h-100">
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
    <div class="container-fluid">
        <nav class="navbar-nav-wrap">
            <!-- White Logo -->
            <a class="navbar-brand d-none d-lg-flex" href="/" >
                <img class="navbar-brand-logo" src="/assets/img/logo.png">
            </a>
            <!-- End White Logo -->

            <!-- Default Logo -->
            <a class="navbar-brand d-flex d-lg-none" href="/">
                <img class="navbar-brand-logo" src="/assets/img/logo.png">
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

    @yield('content')

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory  -->
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>

<!-- JS Front -->
<script src="./assets/js/theme.min.js"></script>

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
