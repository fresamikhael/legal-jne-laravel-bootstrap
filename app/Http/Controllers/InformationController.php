<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $database = Information::orderBy('created_at', 'DESC')
            ->orderBy('title', 'ASC')
            ->filter(request(['type', 'category']))
            ->paginate(10);

        return view('pages.user.information.index', compact('database')) ;
    }

    public function show($id)
    {
        $database = Information::where('id', $id)
            ->with('user')->first();

        return view('pages.user.information.detail', compact('database'));
    }

    public function create()
    {
        return view('pages.legal.information.create');
    }

    public function qnaCreate()
    {
        return view('pages.legal.information.qna');
    }
}
