@extends('frontend.layouts.index')
@section('title',)

@section('description',)

@section('content')
    <!-- Article Description -->
    <div class="container content-space-t-1  content-space-b-2">
        <div class="w-lg-65 mx-lg-auto">

            <div class="mb-4">
                <h1 class="h2"></h1>
            </div>

            <!-- End Row -->

        </div>

        <div class="w-lg-65 mx-lg-auto">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">
                        {!! $error !!}
                    </div>
                @endforeach
            @endif
            <!-- Card -->
            <div class="card bg-dark text-center my-4"
                 style="background-image: url('/assets/svg/components/wave-pattern-light.svg');">
                <div class="card-body">
                    <h4 class="text-white mb-4">Хотите подписаться на свежие документы?</h4>

                    <div class="w-lg-75 mx-lg-auto">
                        <form action="{{ route('subscribe.create') }}" method="post">
                            @csrf
                            <!-- Input Card -->
                            <div class="input-card input-card-sm border">
                                <div class="input-card-form">
                                    <label for="subscribeForm" class="form-label visually-hidden">Укажите email</label>
                                    <input type="email" name="email"  class="form-control" id="subscribeForm"
                                           placeholder="Введите email"                                           >
                                </div>
                                <button type="submit" class="btn btn-primary">Подписаться</button>
                            </div>
                            <!-- End Input Card -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Card -->


            <!-- End Row -->
        </div>
    </div>
    <!-- End Article Description -->




@endsection



