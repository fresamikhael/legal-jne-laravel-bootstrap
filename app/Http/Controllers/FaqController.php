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

    public function indexLegal()
    {
        $database = Faq::get();

        return view('pages.legal.faq.index', compact('database')) ;
    }

    public function showLegal($id)
    {
        $database = Faq::where('id', $id)->first();

        return view('pages.legal.faq.detail', compact('database'));
    }

    public function createLegal()
    {
        return view('pages.legal.faq.add') ;
    }

    public function storeLegal(Request $request)
    {
        $data = $request->all();

        Faq::create($data);

        return redirect()->route('legal.faq-index');
    }
}
