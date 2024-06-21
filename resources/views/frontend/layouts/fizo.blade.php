<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="83051dff11b82da2"/>

    <!-- Title -->
    <title>@yield('title','Офицеру.ру - Правовая поддержка военнослужащих')</title>
    <meta name="description" content="@yield('description') ">

    <!-- Favicon -->
    @include('front.moduls.favicon')

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
    <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css">

    @yield('vendor-styles')
    @yield('page-styles')
</head>

<body>
<!-- ========== HEADER ========== -->
@include('frontend.moduls.header')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="bg-light">
    <div class="container">
        @yield('content')
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- ========== FOOTER ========== -->
@include('frontend.moduls.footer')
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->


<!-- JS Global Compulsory  -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
@yield('vendor-scripts')

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<script src="/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
<script src="/assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="/assets/vendor/typed.js/lib/typed.min.js"></script>
<script src="/assets/vendor/fslightbox/index.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
@yield('page-scripts')

<!-- JS Front -->
<script src="/assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function () {
        // INITIALIZATION OF HEADER
        // =======================================================
        new HSHeader('#header').init()


        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF SHOW ANIMATIONS
        // =======================================================
        new HSShowAnimation('.js-animation-link')


        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
        })


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()






    })()
</script>

@include('frontend.moduls.metrika')
</body>
</html>
