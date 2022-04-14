<?php

namespace App\Http\Controllers\Regulation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormativeController extends Controller
{
    public function index()
    {
        return view('pages.user.regulation.normative.index');
    }

    public function create()
    {
        return view('pages.user.regulation.normative.create');
    }
}
