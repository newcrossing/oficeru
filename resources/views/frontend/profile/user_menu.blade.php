<div class="navbar-expand-lg navbar-light">
    <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
        <!-- Card -->
        <div class="card flex-grow-1 mb-5">
            <div class="card-body">
                <!-- Avatar -->
                <div class="d-none d-lg-block text-center mb-5">
                    <div class="avatar avatar-xxl avatar-circle mb-3">
                        <img class="avatar-img" src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}"
                             alt="Image Description">
                        @if(Auth::user()->email_verified_at)
                            <img class="avatar-status avatar-lg-status"
                                 src="./assets/svg/illustrations/top-vendor.svg"
                                 data-bs-toggle="tooltip" data-bs-placement="top" title="Верифицированный пользователь">
                        @endif

                    </div>

                    <h4 class="card-title mb-0">{{Auth::user()->name}}</h4>
                    <p class="card-text small">{{Auth::user()->email}}</p>
                </div>
                <!-- End Avatar -->

                <!-- Nav -->
                <span class="text-cap">Аккаунт</span>

                <!-- List -->
                <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="./account-overview.html">
                            <i class="bi-person-badge nav-icon"></i> Личная информация
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./account-notifications.html">
                            <i class="bi-bell nav-icon"></i> Уведомления
                            <span
                                class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./account-preferences.html">
                            <i class="bi-sliders nav-icon"></i> Оповещения
                        </a>
                    </li>
                </ul>
                <!-- End List -->

                <div class="d-lg-none">
                    <div class="dropdown-divider"></div>

                    <!-- List -->
                    <ul class="nav nav-sm nav-tabs nav-vertical">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi-box-arrow-right nav-icon"></i> Выйти
                            </a>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Nav -->
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>
