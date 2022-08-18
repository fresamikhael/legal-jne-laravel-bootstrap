<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $database = Faq::get();

        return view('pages.user.faq.index', compact('database')) ;
    }

    public function show($id)
    {
        $database = Faq::where('id', $id)->first();

        return view('pages.user.faq.detail', compact('database'));
    }
}
