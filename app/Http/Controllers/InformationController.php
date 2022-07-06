<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $database = Information::get();

        return view('pages.user.information.index', compact('database')) ;
    }

    public function indexLegal()
    {
        // $database = Information::orderBy('created_at', 'DESC')
        //     ->orderBy('title', 'ASC')
        //     ->filter(request(['type', 'category']))
        //     ->paginate(10);
        $database = Information::get();

        return view('pages.legal.information.index', compact('database')) ;
    }

    public function show($id)
    {
        $database = Information::where('id', $id)
            ->with('user')->first();

        return view('pages.user.information.detail', compact('database'));
    }

    public function showLegal($id)
    {
        $database = Information::where('id', $id)
            ->with('user')->first();

        return view('pages.legal.information.detail', compact('database'));
    }

    public function add()
    {
        return view('pages.legal.information.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['photo'] = 'legalPhoto/' . $filename;
            $file->move('legalPhoto', $filename);
        }

        Information::create($data);

        return redirect()->route('legal.information.index')->with('message_success', 'Informasi Berhasil Ditambahkan.');
    }
}
