<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/img/logo.png" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-secondary-content">
                <!-- Search -->
                <div class="dropdown dropdown-course-search d-lg-none d-inline-block">
                    <a class="btn btn-ghost-secondary btn-sm btn-icon" href="#" id="navbarCourseSearchDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-search"></i>
                    </a>

                    <div class="dropdown-menu dropdown-card" aria-labelledby="navbarCourseSearchDropdown">
                        <!-- Card -->
                        <div class="card card-sm">
                            <div class="card-body">
                                <form class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Что ищем?"
                                           aria-label="What do you want to learn?">
                                    <div class="input-group-append input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Search -->

                <div class="d-inline-block ml-auto">
                    <a class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                       data-bs-target="#offcanvasNavbarSignup" aria-controls="offcanvasNavbarSignup">
                        <span class="d-none d-lg-inline-block">Войти</span>
                        <i class="bi-person-fill d-lg-none"></i>
                    </a>
                </div>
            </div>
            <!-- End Secondary Content -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Главная</a>
                    </li>


                    <!-- Courses -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="coursesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="bi-journals me-2"></i> Контент</a>

                        <!-- Mega Menu -->
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="coursesMegaMenu"
                             style="min-width: 17rem;">
                            <!-- Development -->

                            <a id="developmentMegaMenu" class="hs-mega-menu-invoker dropdown-item " href="/">
                                <i class="bi-files-alt dropdown-item-icon"></i> Документы
                            </a>

                            <a id="developmentMegaMenu" class="hs-mega-menu-invoker dropdown-item " href="/">
                                <i class="bi-file-text dropdown-item-icon"></i> Статьи
                            </a>

                            <a id="developmentMegaMenu" class="hs-mega-menu-invoker dropdown-item " href="/">
                                <i class="bi-exclamation dropdown-item-icon"></i> Новости
                            </a>

                            <!-- End Development -->


                            <!-- End Music -->
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Courses -->

                    <!-- Search Form -->
                    <li class="nav-item flex-grow-1 d-none d-lg-inline-block ">
                        <form class="input-group input-group-merge">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Что ищем?"
                                   aria-label="What do you want to learn?">
                        </form>
                    </li>
                    <!-- End Search Form -->

                    <!-- Dropdown -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Инструменты</a>
                        <div class="hs-sub-menu hs-position-right dropdown-menu" aria-labelledby="listingsDropdown"
                             style="min-width: 14rem;">
                            <a class="dropdown-item " href="https://fizo.oficeru.ru/">Онлайн калькулятор физо
                                военнослужащих</a>
                            <a class="dropdown-item " href="https://vt4.oficeru.ru/">Онлайн калькулятор по военному
                                многоборью (ВТ-4) военнослужащих</a>

                        </div>
                    </li>
                    <!-- End Dropdown -->
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
