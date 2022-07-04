<?php

namespace App\Http\Controllers\Misc;

use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\CustomerDispute;
use App\Models\DatabaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DocumentRequest;
use App\Models\Outstanding;
use App\Models\Permit;
use App\Models\PowerAttorney;

class StatisticController extends Controller
{
    public function index()
    {
        return view('pages.legal.statistic.index');
    }

    public function databaseIndex()
    {
        $data = DatabaseRequest::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.database', compact('data'));
    }

    public function draftingIndex()
    {
        $data = Customer::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.drafting', compact('data'));
    }

    public function litigationIndex()
    {
        $data = CustomerDispute::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.litigation', compact('data'));
    }

    public function permitIndex()
    {
        $data = Permit::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.permit', compact('data'));
    }

    public function corporateIndex()
    {
        $data = PowerAttorney::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.corporate', compact('data'));
    }

    public function requestIndex()
    {
        $data = DocumentRequest::orderBy('id', 'DESC')
                ->latest('created_at')
                ->limit(5)
                ->get();

        return view('pages.legal.statistic.request', compact('data'));
    }
}
