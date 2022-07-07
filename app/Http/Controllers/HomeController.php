<?php

namespace App\Http\Controllers;

use App\Models\HomeBelow;
use App\Models\HomeFoot;
use App\Models\HomeMiddle;
use App\Models\HomeTop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top = HomeTop::latest()->first();
        $middle = HomeMiddle::latest()->first();
        $below = HomeBelow::latest()->first();
        $foot = HomeFoot::latest()->first();

        return view('pages.user.index', compact('top', 'middle', 'below', 'foot'));
    }
}
