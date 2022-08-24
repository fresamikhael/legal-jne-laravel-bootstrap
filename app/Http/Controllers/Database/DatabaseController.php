<?php

namespace App\Http\Controllers\Database;

use App\Models\Database;
use Illuminate\Support\Str;
use App\Models\DatabaseFile;
use App\Models\DatabaseType;
use Illuminate\Http\Request;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
use App\Models\RegulationRequestAccess;

class DatabaseController extends Controller
{
    public function index()
    {
        $database = Database::orderBy('year', 'DESC')
            ->orderBy('name', 'ASC')
            ->filter(request(['privilege', 'type', 'number', 'year', 'about']))
            ->paginate(10);
        $type = DatabaseType::get();

        return view('pages.user.database.index',compact('database', 'type'));
    }

    public function indexLegal()
    {
        $type = DatabaseType::get();

        $database = Database::orderBy('year', 'DESC')
            ->orderBy('name', 'ASC')
            ->filter(request(['privilege','type', 'name', 'year', 'title']))
            ->paginate(10);

        return view('pages.legal.database.index',compact('database', 'type'));
    }

    public function indexRequestLegal()
    {
        $data = RegulationRequestAccess::with('database')->get();

        return view('pages.legal.database.request',compact('data'));
    }

    public function add()
    {
        $type = DatabaseType::get();
        $database = Database::get();

        return view('pages.legal.database.add', compact('type', 'database'));
    }

    public function store(Request $request)
    {
        $database = Database::create($request->all());

        $files = $request->file('file_database');

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $filename = $name . '.' . $extension;
            $file->move('database', $filename);

            DatabaseFile::create([
                'database_id' => $database->id,
                'name' => 'database/'.$filename
            ]);
        }

        return to_route('legal.database.add')->with('message_success', 'Peraturan berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        $data = Database::where('id', $id)
            ->with('file')->first();
        $type = DatabaseType::get();
        $database = Database::get();

        return view('pages.legal.database.edit', compact('data', 'type', 'database'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $regulation = Database::where('id',$id)->firstOrFail();

        if ($request->file('file_database')) {
        $files = $request->file('file_database');

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '-' . '.' . $extension;
            $file->move('database', $filename);

            DatabaseFile::where('database_id', $id)->update([
                'name' => 'database/'.$filename
            ]);
            }
        }
        else {
            unset($data['file']);
        }

        $regulation->update($data);

        return to_route('legal.database.index')->with('message_success', 'Peraturan berhasil diubah.');
    }

    public function show($id)
    {
        $database = Database::where('id', $id)
            ->with('file')->first();

        return view('pages.user.database.detail', compact('database'));
    }

    public function delete($id)
    {
        Database::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.database.index')->with('message_success', 'Peraturan berhasil di dihapus!.');;
    }

    public function legalShow($id)
    {
        $database = Database::where('id', $id)
            ->with('file')->first();

        return view('pages.legal.database.detail', compact('database'));
    }

    public function addType()
    {
        $table = DatabaseType::orderBy('id', 'DESC')->get();

        return view('pages.legal.database.type.add', compact('table'));
    }

    public function storeType(Request $request)
    {
        $data = $request->all();

        DatabaseType::create($data);

        return redirect()->route('legal.database.add')->with('message_success', 'Tipe Regulasi berhasil di tambahkan!.');;
    }

    public function requestPublicPost(Request $request)
    {
        $data = $request->all();

        RegulationRequestAccess::create([
            'database_id' => $data['database_id'],
            'name' => $data['name'],
            'location' => $data['location'],
            'nik' => $data['nik'],
        ]);

        return redirect()->back()->with('status', 'Data berhasil disubmit!');
    }

    public function deleteType($id)
    {
        DatabaseType::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.database.add-type')->with('message_success', 'Tipe Regulasi berhasil di dihapus!.');;
    }
}
