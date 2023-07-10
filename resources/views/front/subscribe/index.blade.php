@extends('front.layouts.full')

@section('title','Подписка')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('widgets')

@endsection

@section('content')

    <div class="rw-row subtle large ">

        <div class="grid-container">


            <div class="grid desk-6">

            </div>

            <div class="grid desk-6">

            </div>
            <div class="clear"></div>
            <div class="" style="text-align: center; margin-top: 20px">
                <span class="text-primary" style="font-size: 24px"> Подписка на <strong>уведомления</strong> о новых документах</span><br>
                <span class="text-dark-gray" style="font-size: 14px"> Получение ежедневных уведомлений о
                    поступлении <br> новых документов в сфере военного законодательства.</span>
                <form action="{{ route('subscribe.create') }}" method="post">
                    @csrf
                    <div class="grid desk-12">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <h4 class="text-red" > {!! $error !!}  </h4>
                            @endforeach
                        @endif
                            <input type="email" name="email" style="font-size: 22px" placeholder="Ваш e-mail" required>
                    </div>
                    <div class="grid desk-12">
                        <input type="submit" value="Подписаться" class="button primary">
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>

    </div> <!-- .rw-row -->

@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection
