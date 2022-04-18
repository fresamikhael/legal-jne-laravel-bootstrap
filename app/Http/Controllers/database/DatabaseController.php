<?php

namespace App\Http\Controllers\database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('pages.user.database.index');
    }
}
