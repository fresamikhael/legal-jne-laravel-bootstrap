<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        return view('pages.user.litigation.other');
    }
}
