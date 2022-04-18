<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewPermitController extends Controller
{
    public function index()
    {
        return view('pages.user.permit.perizinan-baru');
    }
}
