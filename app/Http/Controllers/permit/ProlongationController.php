<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProlongationController extends Controller
{
    public function index()
    {
        return view('pages.user.permit.perpanjangan.perpanjangan');
    }
}
