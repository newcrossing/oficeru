<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="83051dff11b82da2"/>
    <title>@yield('title') / Офицеру.ру</title>
    <meta name="description" content="@yield('description') ">

    @yield('canonical')
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/fonts/awards/awards.css"/>
    <link rel="stylesheet" href="/assets/css/styles.css"/>


    @include('front.moduls.favicon')

    @yield('vendor-styles')
    @yield('page-styles')
</head>
<body>
<section id="rw-layout" class="rw-layout">

    <!--
    // ===================================^__^=================================== //
       Header
    // ===================================^__^=================================== //
    -->
    @include('front.moduls.header')


    <!--
    // ===================================^__^=================================== //
       Content
    // ===================================^__^=================================== //
    -->
    <div class="rw-section rw-container right-sidebar">
        <div class="rw-inner clearfix">

            <!-- Sidebar -->
            <div class="rw-column rw-sidebar">
                <div class="the-sidebar">

                    @yield('widgets')

                </div> <!-- .the-sidebar -->
            </div> <!-- .rw-sidebar -->

            <!-- Main content -->
            <div class="rw-column rw-content">

                @include('front.moduls.breadcrumb')
                @include('front.moduls.title')

                @yield('content')
            </div> <!-- .rw-content -->

        </div> <!-- .rw-inner -->
    </div> <!-- .rw-container -->

    <!--
    // ===================================^__^=================================== //
       Footer
    // ===================================^__^=================================== //
    -->
    @include('front.moduls.footer')
</section><!-- .rw-layout -->

<!-- Javascript -->

<script src="/assets/js/library/jquery-2.1.1.min.js"></script>
<script src="/assets/js/min/smk-menu.min.js"></script>
<script src="/assets/js/rw-sidebar.js"></script>
<script src="/assets/js/min/jquery.qtip.min.js"></script>
<script src="/assets/js/min/smk-accordion.min.js"></script>
<script src="/assets/js/min/smk-visual-select.min.js"></script>
<script src="/assets/js/min/owl.carousel.min.js"></script>
@yield('vendor-scripts')

<script src="/assets/js/scripts.js"></script>
@yield('page-scripts')

@include('front.moduls.metrika')
</body>
</html>

