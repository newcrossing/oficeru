@extends('frontend.layouts.index')
@section('title','Повторное подтверждение')

@section('description','')

@section('content')

    <div class="container content-space-t-1  content-space-b-2">
        <div class="w-lg-65 mx-lg-auto">

            <h4 class="display-6 text-center text-danger">
                Повторное подтверждение e-mail,<br>
                действие остановлено<br>
                <span class="text-primary text-highlight-danger">{{$text['email']}}</span>
            </h4>

            <div class="card-footer pt-0 mt-7">
                <div class="d-flex justify-content-center gap-3">
                    <a class="btn btn-primary" href="/">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection



