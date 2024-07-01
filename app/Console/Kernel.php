<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        'App\Console\Commands\DatabaseBackUp'
    ];
    protected function schedule(Schedule $schedule)
    {
       // $schedule->command('database:backup')->daily();
       // $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('00:03');
        $schedule->command('backup:monitor')->daily()->at('00:03');

/*         $schedule
      ->command('backup:run')->daily()->at('01:00')
      ->onFailure(function () {
         dd('bien');
      })
      ->onSuccess(function () {
        dd('non');
      }); */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
