<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function create()
    {
        return view('pages.legal.information.create');
    }

    public function qnaCreate()
    {
        return view('pages.legal.information.qna');
    }
}
