<?php

namespace App\Http\Controllers\Drafting;

use App\Http\Controllers\Controller;
use App\Models\Other;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        $table = Other::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Other::query()->where('id', auth()->user()->id);

        return view('pages.user.drafting.other.index', compact('data', 'table'));
    }

    public function legalCreate()
    {
        $table = Other::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Other::query()->where('id', auth()->user()->id);

        return view('pages.legal.drafting.other.index', compact('data', 'table'));
    }
}
