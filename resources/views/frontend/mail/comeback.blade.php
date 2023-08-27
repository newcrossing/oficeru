@extends('frontend.mail.layout')


@section('content')
    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                Здравствуйте.<br><br>
                Некоторое время назад Вы регистрировались на сайте <a style="color: #555" href="https://oficeru.ru/">офицеру.ру</a>
                <br>
                Вы так и подтвердили свой e-mail. Если так и не планируете пользоваться сервисами сайта просто
                проигнорируйте это сообщение. <br><br>
                В случае если хотите продолжить пользоваться сайтом можете подтвердить ваш e-mail по ссылке ниже. Вам
                доступен сервис получения уведомлений о новых документах касательно военной службы.<br>
                Если забыли пароль воспользуйтесь формой <a href="https://oficeru.ru/pass/reset">восстановления
                    пароля</a>.

                <br>
            </div>
        </td>
    </tr>

    <tr>
        <td align="center"
            style="font-size:0px;padding:10px 25px;padding-top:30px;padding-bottom:50px;word-break:break-word;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                   style="border-collapse:separate;line-height:100%;">
                <tr>
                    <td align="center" bgcolor="#2F67F6" role="presentation"
                        style="border:none;border-radius:3px;color:#ffffff;cursor:auto;padding:15px 25px;"
                        valign="middle">
                        <a href="{!! $data['link'] !!}"
                           style="background:#2F67F6;color:#ffffff;font-family:'Helvetica Neue',Arial,sans-serif;font-size:15px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;">
                            Подтвердить e-mail
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
