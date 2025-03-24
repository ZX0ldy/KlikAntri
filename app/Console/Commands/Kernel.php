<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
   /**
 * Define the application's command schedule.
 */
protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule): void
{
    // Run daily at midnight to clean up expired reservations
    $schedule->command('reservasi:delete-expired')->dailyAt('00:00');
}
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

}
