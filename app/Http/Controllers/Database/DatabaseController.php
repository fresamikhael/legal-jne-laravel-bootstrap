<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Models\Database;
use App\Models\DatabaseFile;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        $database = Database::orderBy('year', 'DESC')
            ->orderBy('name', 'ASC')
            ->filter(request(['type', 'number', 'year', 'title']))
            ->paginate(10);

        return view('pages.user.database.index',compact('database'));
    }

    public function add()
    {
        return view('pages.user.database.add');
    }

    public function store(Request $request)
    {
        $database = Database::create($request->all());

        $files = $request->file('file_database');

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '-' . '.' . $extension;
            $file->move('database', $filename);

            DatabaseFile::create([
                'database_id' => $database->id,
                'name' => 'database/'.$filename
            ]);
        }

        return to_route('database.add')->with('message_success', 'Database Berhasil ditambahkan.');
    }

    public function show($id)
    {
        $database = Database::where('id', $id)
            ->with('file')->first();

        return view('pages.user.database.detail', compact('database'));
    }
}
