<?php


namespace App\Helpers;

use App\Mail\NewDocMail;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Request;


class MailingDoc

{
    /**
     * Рассылка новых  документов
     * @return void
     */
    public static function send()
    {
        $docs = Document::where('notify', 1)
            ->where('pub', 1)
            ->get();

        if ($docs->count()) {
            $data = [
                'docs' => '',
            ];

            // пользователи которые хотят получать сообщения
            $users = User::where('notify_doc', 2)->get();

            $tmpText = '';
            $tmpBlock = '<a href="%s"  class="btn">%s</a><p>%s</p><br>';
            foreach ($docs as $doc) {
                $tmpText .= sprintf($tmpBlock, $doc->getLink(), $doc->getShotName(), ' &laquo;' . $doc->short_name . '&raquo;');
            }

            //php artisan queue:work --queue=high,default
            // для запуска очереди

            $data['docs'] = $tmpText;
            // каждому письмо отдельно
            foreach ($users as $user) {
                Mail::to($user)->queue(new NewDocMail($data));
            }

            // меняю статус документов на уведомленные
            Document::where('notify', 1)
                ->where('pub', 1)
                ->update(['notify' => 2]);
            return $docs->count();
        } else {
            return 0;
        }
    }


}
