<?php

namespace App\Http\Controllers\Misc;

use App\Models\Database;
use App\Models\Regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $data = Database::orderBy('id', 'DESC')
            ->with('file')
            ->get();

        // $data = Regulation::orderBy('id', 'DESC')
        //     ->with('data')
        //     ->get();

        return view('pages.legal.search.index', compact('data'));
    }
}
