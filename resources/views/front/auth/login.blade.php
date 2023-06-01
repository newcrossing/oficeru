@extends('front.layouts.index')

@section('title','Авторизация')
@section('h1','Авторизация')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')
    {{ Widget::run('search') }}

@endsection

@section('content')
    <div class="rw-row">
        <div class="grid-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="grid desk-3 alpha">

                </div>

                <div class="grid desk-6 omega">
                    <div class="form-label">Логин</div>
                    <div class="grid desk-12 both">
                        @error('login')
                        <div class=" text-red" style="font-size: 12px">{{ $message }}</div>
                        @enderror
                        <input type="text" name="login" class="fullwidth" value="{{ old('login') }}" autofocus required>
                    </div>
                    <div class="form-label">Пароль</div>
                    <input type="password" name="password" class=" fullwidth" value="" required>

                    <input type="submit" value="Отправить" class="button primary"/>

                </div>

                <div class="grid desk-3 alpha">

                </div>


            </form>
        </div> <!-- .grid-container -->


    </div> <!-- .rw-row -->

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection
