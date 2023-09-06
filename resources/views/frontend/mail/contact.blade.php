@extends('frontend.mail.layout')


@section('content')
    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                <br>
                Получено сообщение через  <a style="color: #555" href="https://oficeru.ru/contact">Контакт</a>
                <br><br>
                Имя: <b>{{$data['name']}}</b>  <br>
                Email: <b>{{$data['email']}}</b>  <br>
                Сообщение:  <br>
                    <b>{{$data['text']}}</b> <br><br>
            </div>
        </td>
    </tr>


@endsection
