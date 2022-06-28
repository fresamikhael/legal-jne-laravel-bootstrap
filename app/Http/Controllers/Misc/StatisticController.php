<?php

namespace App\Http\Controllers\Misc;

use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\CustomerDispute;
use App\Models\DatabaseRequest;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function index()
    {
        $data = DatabaseRequest::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(3)
                ->get();

        return view('pages.legal.statistic', compact('data'));
    }
}
