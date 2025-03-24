<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Poli;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Menghitung total jumlah poli dan membagikan ke semua views
        $jumlahPoli = Poli::count();
        View::share('jumlahPoli', $jumlahPoli);
    }
}
