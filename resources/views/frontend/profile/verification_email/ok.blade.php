@extends('frontend.layouts.index')
@section('title','Подтверждение e-mail прошла успешно')

@section('description','')

@section('content')

    <div class="container content-space-t-1  content-space-b-2">
        <div class="w-lg-65 mx-lg-auto">

            <h4 class="display-6 text-center">E-mail подтвержден<br>
                <span class="text-primary text-highlight-warning">{{$text['email']}}</span>
            </h4>

            <div class="card-footer pt-0 mt-7">
                <div class="d-flex justify-content-center gap-3">
                    <a class="btn btn-primary" href="/">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection



