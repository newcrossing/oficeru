<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light"
        data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/img/logo.png" alt="офицеру.ру">
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
                                <form class="input-group input-group-merge" method="get" action="/s/">
                                    <input type="text" class="form-control" placeholder="Что ищем?" name="s">
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
                @guest()
                    <div class="d-inline-block ml-auto">
                        <a class="btn btn-primary" type="button" href="{{route('login')}}">
                            <span class="d-none d-lg-inline-block">Войти</span>
                            <i class="bi-person-fill d-lg-none"></i>
                        </a>
                    </div>
                @endguest

                @auth()
                    <!-- Account -->
                    <div class="dropdown">
                        <a href="#" id="navbarShoppingCartDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false" data-bs-dropdown-animation>
                            <img class="avatar avatar-xs avatar-circle"
                                 src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}"
                            >
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarShoppingCartDropdown"
                             style="min-width: 16rem;">
                            <a class="d-flex align-items-center p-2" href="{{route('profile.settings')}}">
                                <div class="flex-shrink-0">
                                    <img class="avatar"
                                         src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="d-block fw-semi-bold">{{Auth::user()->name}}</span>
                                    <span class="d-block text-muted small">{{Auth::user()->email}}</span>
                                </div>
                            </a>

                            <div class="dropdown-divider my-3"></div>

                            {{--                            <a class="dropdown-item" href="#">--}}
                            {{--                                            <span class="dropdown-item-icon">--}}
                            {{--                                              <i class="bi-chat-left-dots"></i>--}}
                            {{--                                            </span> Messages--}}
                            {{--                            </a>--}}
                            {{--                            <a class="dropdown-item" href="#">--}}
                            {{--                <span class="dropdown-item-icon">--}}
                            {{--                  <i class="bi-wallet2"></i>--}}
                            {{--                </span> Purchase history--}}
                            {{--                            </a>--}}
                            <a class="dropdown-item" href="{{route('profile.settings')}}">
                                            <span class="dropdown-item-icon">
                                              <i class="bi-person"></i>
                                            </span> Настройки
                            </a>

                            {{--                            <a class="dropdown-item" href="#">                <span class="dropdown-item-icon">--}}
                            {{--                  <i class="bi-credit-card"></i>--}}
                            {{--                </span> Payment methods--}}
                            {{--                            </a>--}}

                            <div class="dropdown-divider"></div>

                            @role('admin')
                            <a class="dropdown-item" href="/admin/">
                                <span class="dropdown-item-icon"><i class="bi-question-circle"></i></span>
                                Перейти в админку
                            </a>
                            @endrole

                            <a class="dropdown-item" href="{{route('logout')}}">
                                <span class="dropdown-item-icon"><i class="bi-box-arrow-right"></i></span>
                                Выйти
                            </a>
                        </div>
                    </div>
                    <!-- End Account -->
                @endauth
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
                    <li class="nav-item">
                        <a class="nav-link " href="/doc">
                            <i class="bi-files-alt dropdown-item-icon"></i> Документы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/post">
                            <i class="bi-file-text dropdown-item-icon"></i> Статьи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/news">
                            <i class="bi bi-newspaper dropdown-item-icon"></i> Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('contact.index')}}">
                            <i class="bi bi-send-fill dropdown-item-icon"></i> Контакт
                        </a>
                    </li>

                    <!-- Dropdown -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Инструменты</a>
                        <div class="hs-sub-menu hs-position-right dropdown-menu" aria-labelledby="listingsDropdown"
                             style="min-width: 14rem;">
                            <a class="dropdown-item " href="https://fizo.oficeru.ru/">
                                Онлайн калькулятор физо военнослужащих</a>
                            <a class="dropdown-item " href="https://fizo2023.oficeru.ru/">
                                Онлайн калькулятор физо военнослужащих с 1 сентября 2023 г. </a>
                            <a class="dropdown-item " href="https://vt4.oficeru.ru/">
                                Онлайн калькулятор по военному многоборью (ВТ-4) военнослужащих</a>
                        </div>
                    </li>
                    <!-- End Dropdown -->
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
