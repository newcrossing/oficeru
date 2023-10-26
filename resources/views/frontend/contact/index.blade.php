@extends('frontend.layouts.index')
@section('title','')

@section('description','')

@section('content')
    <!-- Contacts -->
    <div class="position-relative">
        <div class="bg-primary bg-img-start" style="background-image: url('/assets/svg/components/shape-7.svg');">
            <div class="container content-space-t-2 content-space-t-lg-3 content-space-b-1">
                <!-- Heading -->
                <div class="w-lg-50 text-center mx-lg-auto mb-7">
                    <span class="text-cap text-white-70">Контакт</span>
                    <h2 class="text-white lh-base">Напишите сюда ваш вопрос или <span
                            class="text-warning">предложение</span></h2>
                </div>
                <!-- End Heading -->

                <div class="mx-auto" style="max-width: 35rem;">
                    <!-- Card -->
                    <div class="card zi-2">
                        <div class="card-body">
                            <!-- Form -->
                            @if ($errors->any())
                                <div class="alert alert-danger ms-3 me-3 mt-3" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('contact.send')}}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-sm-12">
                                        <!-- Form -->
                                        <div class="mb-4">
                                            <label class="form-label" for="hireUsFormLasttNameEg1">Имя</label>
                                            <input type="text" class="form-control form-control-lg"
                                                   name="name" id="hireUsFormLasttNameEg1"
                                                   placeholder="Ваше имя" required>
                                        </div>
                                        <!-- End Form -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->

                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="form-label" for="hireUsFormWorkEmailEg1">Email</label>
                                    <input type="email" class="form-control form-control-lg"
                                           name="email" id="hireUsFormWorkEmailEg1"
                                           placeholder="email@site.com" required>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="form-label" for="hireUsFormDetailsEg1">Текст</label>
                                    <textarea class="form-control form-control-lg" name="text"
                                              id="hireUsFormDetailsEg1" placeholder="Текст..."
                                              rows="4" required></textarea>
                                </div>

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
                                <!-- End Form -->

                                <div class="d-grid mb-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
                                </div>

                                <div class="text-center">
                                    <span class="form-text">Ответим вам в ближайшее время.</span>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>

        <!-- Shape -->
        <div class="shape shape-bottom zi-1">
            <svg width="3000" height="500" viewBox="0 0 3000 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 500H3000V0L0 500Z" fill="#fff"/>
            </svg>
        </div>
        <!-- End Shape -->
    </div>


    <!-- End Contacts -->

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



