<?php

namespace App\Console\Commands;

use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservasi:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired reservations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get yesterday's date
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        // Count reservations to be deleted
        $count = Reservasi::where('tanggal', '<', Carbon::today()->format('Y-m-d'))->count();

        // Delete all reservations with a date before today
        Reservasi::where('tanggal', '<', Carbon::today()->format('Y-m-d'))->delete();

        $this->info("Deleted {$count} expired reservation(s).");
        Log::info("DeleteExpiredReservations: Deleted {$count} expired reservation(s).");

        return Command::SUCCESS;
    }
}   
