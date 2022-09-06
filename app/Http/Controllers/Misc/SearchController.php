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
        $regulation = Database::orderBy('id', 'DESC')
            ->with('file')
            ->get()->toArray();

        $database = Regulation::orderBy('id', 'DESC')
            ->with('data')
            ->get()->toArray();

        $join = array_merge($regulation,$database);

        // dd($regulation, $database);

        return view('pages.legal.search.index', compact('join'));
    }
}
