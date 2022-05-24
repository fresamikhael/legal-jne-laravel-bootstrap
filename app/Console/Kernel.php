<?php

namespace App\Console;

use App\Http\Controllers\LegalCorporate\LandSellController;
use App\Models\LandSell;
use App\Models\Permit;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        Commands\JNECron::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('JNE:cron')->everyMinute();
        $schedule->call(function () {
            // print("test");

            // $jumlahpermit = Permit::all();

            // foreach ($jumlahpermit as $permit) {
            //     print("test");
            //     // $waktu = $permit->updated_at;
            //     // $sekarang = \Carbon\Carbon::now();
            //     // $difference = $sekarang->diffInDays($waktu, false);
            //     // if ($difference == 90) {
            //     //     print("test");
            //     // }
            // }

            $expiredLandSell = LandSell::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();

            foreach ($expiredLandSell as $expired) {
                if ($expired->status == 'RETURNED BY USER' || $expired->status == 'RETURNED BY LEGAL CORPORATES'){
                    $expired->update([
                        'status' => 'REJECTED'
                    ]);
                }
            }
            
        })->everyMinute();
    }

    // protected function rejectLandSell(Schedule $schedule)
    // {
    //     $schedule->call(function () {

    //         $expiredLandSell = LandSell::where('created_at', '<=', Carbon::now()->subDays(1)->toDateTimeString())->get();
    //         print($expiredLandSell);
    //         DB::table('recent_users')->delete();
    //     })->everyMinute();
    // }

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
