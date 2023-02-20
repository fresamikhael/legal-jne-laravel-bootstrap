<?php

namespace App\Http\Controllers\Regulation;

use Carbon\Carbon;
use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationFile;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class NormativeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Regulation::query()->where('rule_type', 'Normatif');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('regulation.normative-detail', [$row->id]) . '" class="btn btn-primary justify-content-center">Detail</a>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.user.regulation.normative.index');
    }

    public function indexLegal()
    {
        if (request()->ajax()) {
            $data = Regulation::query()->where('rule_type', 'Normatif');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('legal.regulation.normative-detail', [$row->id]) . '" class="btn btn-primary justify-content-center">Detail</a>
                        <a href="' . route('legal.regulation.normative-edit', [$row->id]) . '" class="btn btn-primary justify-content-center">Edit</a>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.legal.regulation.normative.index');
    }

    public function create()
    {
        $type = RegulationType::query()->where('type', 'Khusus')->get();
        $database = Regulation::get();

        return view('pages.legal.regulation.normative.create', compact('database', 'type'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        // $validator = Validator::make(
        //     $file,
        //     [
        //         '*.*' => 'max:1000'
        //     ]
        // );
        // if ($validator->fails()) {
        //     return redirect()->route('legal.regulation.index')->with('message_danger', 'Data gagal diupload.');
        // }

        $no = 0;
        $database = $request->input();
        if ($request->input('date')) {
            $database['agency'] = Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('Y');
        }
        $dir = 'regulation/';

        $databaseFiles = [];
        $idRegulation = Regulation::create($database)->id;
        if ($file) {
            foreach ($file as $key => $value) {
                if ($key == 'upload') {
                    foreach ($value as $keys => $values) {
                        $random = Str::random(5);
                        $name = $values->getClientOriginalName();
                        $ext = $values->getClientOriginalExtension();
                        $filename = $name . '-' . $random . '.' . $ext;
                        $values->move($dir, $filename);
                        $databaseFiles[$no]['regulation_id'] = $idRegulation;
                        $databaseFiles[$no]['name'] = 'upload';
                        $databaseFiles[$no]['filepath'] = $dir . $filename;
                        $no += 1;
                    }
                } else {
                    $random = Str::random(5);
                    $name = $value->getClientOriginalName();
                    $ext = $value->getClientOriginalExtension();
                    $filename = $name . '-' . $random . '.' . $ext;
                    $value->move($dir, $filename);
                    $databaseFiles[$no]['regulation_id'] = $idRegulation;
                    $databaseFiles[$no]['name'] = $key;
                    $databaseFiles[$no]['filepath'] = $dir . $filename;
                    $no += 1;
                }
            }
            RegulationFile::insert($databaseFiles);
            // DB::table('regulation_files')->insert($databaseFiles);
        }
        return redirect()->route('legal.regulation.index')->with('message_success', 'File berhasil di upload.');
    }

    public function edit($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();
        $type = RegulationType::query()->where('type', 'Khusus')->get();
        $database = Regulation::where('id', $id)
            ->with('data')->first();
        $relation = Regulation::get();

        return view('pages.legal.regulation.normative.edit', [
            'data' => $data,
            'type' => $type,
            'database' => $database,
            'relation' => $relation
        ]);
    }

    public function update(Request $request, Regulation $regulation, $id)
    {
        $data = $request->all();

        $regulation = Regulation::where('id', $id)->firstOrFail();

        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = Str::random(40) . '.' . $extension;
        //     $data['file'] = 'Regulation/'.$filename;
        //     $file->move('Regulation', $filename);
        // }
        // else {
        //     unset($data['file']);
        // }

        if ($request->file('file_database')) {
            $files = $request->file('file_database');

            foreach ($files as $file) {
                // $extension = $file->getClientOriginalExtension();
                $name = $file->getClientOriginalName();
                $filename = $name;
                $file->move('regulation', $filename);

                RegulationFile::where('regulation_id', $id)->update([
                    'name' => 'regulation/' . $filename
                ]);
            }
        } else {
            unset($data['file']);
        }

        $regulation->update($data);

        return redirect()->route('legal.regulation.index')->with('message_success', 'Berhasil memperbaharui data');;
    }

    public function show($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();

        return view('pages.user.regulation.normative.detail', [
            'data' => $data
        ]);
    }

    public function showLegal($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();

        return view('pages.legal.regulation.normative.detail', [
            'data' => $data
        ]);
    }
}
