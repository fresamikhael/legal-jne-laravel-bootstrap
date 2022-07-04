<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\DraftingChart::class,
            \App\Charts\LitigationChart::class,
            \App\Charts\PermitChart::class,
            \App\Charts\CorporateChart::class,
            \App\Charts\RequestChart::class
        ]);
    }
}
