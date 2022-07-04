<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Support\Facades\DB;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $in = DB::table('database_requests')->where('status', 'PENDING')->get()->count();
        $proc = DB::table('database_requests')->where('status', 'IN PROGRESS')->get()->count();
        $out = DB::table('database_requests')->where('status', 'FINISH')->get()->count();

        return Chartisan::build()
            ->labels(['Dokumen Masuk', 'Proses', 'Selesai'])
            ->dataset('Sample', [$in, $proc, $out]);
    }
}
