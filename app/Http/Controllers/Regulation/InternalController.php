<?php

namespace App\Http\Controllers\Regulation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function index()
    {
        return view('pages.user.regulation.internal.index');
    }

    public function create()
    {
        return view('pages.user.regulation.internal.create');
    }
}
