<?php


namespace App\Helpers;

use App\Mail\NewDocMail;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
use Request;


class MailingDoc
{
    /**
     * Рассылка новых документов
     * @return void
     */
    public static function send()
    {
        // документы отмеченные для уведомления
        $docs = Document::where('notify', 1)->where('pub', 1)->get();

        // документы вступающие в силу сегодня
        $docs_today = Document::where('date_vst', Carbon::today())->where('pub', 1)->get();

        // если есть что оповестить
        if ($docs->count() || $docs_today->count()) {
            $data = [
                'docs' => '',
                'unsubscribe' => ''
            ];

            // пользователи, которые хотят получать сообщения
            // $users = User::whereNotNull('email_verified_at')->where('notify_doc', 1)->orWhere('notify_vst', 1)->get();

            $users = User::whereNotNull('email_verified_at')
                ->where(function ($query) {
                    $query->where('notify_doc', 1)
                        ->orWhere('notify_vst', 1);
                })->get();

            $countMailing = 0;
            $tmpText = '';
            $tmpTextDoc = '';
            $tmpTextVst = '';
            $tmpBlock = '<div style="margin-left: 20px; margin-bottom: 10px"><a href="%s" style="color:#555; font-weight: bold;">%s</a><br>%s</div>';
            if ($docs->count()) {
                $tmpTextDoc .= '<h3>Новые документы на сайте</h3>';
                foreach ($docs as $doc) {
                    $tmpTextDoc .= sprintf($tmpBlock, $doc->getLink() . '?utm_medium=email', $doc->getShotName(),
                        ' &laquo;' . $doc->short_name . '&raquo;');
                }
            }

            if ($docs_today->count()) {
                $tmpTextVst .= '<h3>Сегодня вступают в силу</h3>';
                foreach ($docs_today as $doc) {
                    $tmpTextVst .= sprintf($tmpBlock, $doc->getLink(), $doc->getShotName(),
                        ' &laquo;' . $doc->short_name . '&raquo;');
                }
            }

            //php artisan queue:work --queue=high,default
            // для запуска очереди

            // $data['docs'] = $tmpText;
            // каждому письмо отдельно
            foreach ($users as $user) {
                $data['docs'] = '';
                if ($user->notify_doc) {
                    $data['docs'] .= $tmpTextDoc;
                }
                if ($user->notify_vst) {
                    $data['docs'] .= $tmpTextVst;
                }

                // если есть материал для отправки пользователю и продакшн
                if ($data['docs'] && App::environment('production')) {
                    $data['unsubscribe'] = URL::signedRoute('unsubscribe', ['user' => $user->id]);
                    Mail::to($user)->queue(new NewDocMail($data));
                    $countMailing = $countMailing + 1;
                }
            }

            // меняю статус документов на уведомленные
            Document::where('notify', 1)
                ->where('pub', 1)
                ->update(['notify' => 2]);
            return $countMailing;
        } else {
            return 0;
        }
    }


}
