<?php

namespace App\Console;

use App\Mail\NewDocMail;
use App\Models\Document;
use App\Models\User;
use App\Helpers\MailingDoc;
use App\Helpers\Activity;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Щупается кроном каждую минуту. Выполняется по своему расписанию
        $schedule->call(function () {
            // документы для рассылки
            if ($num = MailingDoc::send()) {
                Activity::add(sprintf('Рассылка документов успешна. Отправлено %s писем.', $num), Activity::SUCCESS);
            } else {
                Activity::add('Рассылка документов пустая ');
            }
        })->dailyAt('06:00');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
