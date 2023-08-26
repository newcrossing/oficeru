@extends('frontend.layouts.auth')

@section('title','Авторизация')
@section('description','Авторизация на сайте')

@section('page-styles')
@endsection

@section('content')
    <!-- Form -->
    <div class="container-fluid">
        <div class="row">
            @include('frontend.auth.moduls.citata')

            <div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                    <!-- Heading -->
                    <div class="text-center mb-5 mb-md-7">
                        <h1 class="h2">Сброс пароля</h1>
                        <p>Укажите Ваш e-mail на который мы вышлем ссылку для сброса пароля</p>
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
                    <form class="js-validate needs-validation" novalidate {{ route('pass.request') }} method="POST">
                        @csrf
                        <!-- Form -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label" for="signupEmail" tabindex="0">
                                    Ваш e-mail</label>

                                <a class="form-label-link" href="/login">
                                    <i class="bi-chevron-left small ms-1"></i> Войти
                                </a>
                            </div>

                            <input type="email" class="form-control form-control-lg" name="email"
                                   id="signupEmail" tabindex="1"
                                   placeholder="Укажите email" autofocus required>
                            <span class="invalid-feedback">Укажите корректный e-mail.</span>
                        </div>
                        <!-- End Form -->

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



