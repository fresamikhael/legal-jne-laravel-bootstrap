<?php

namespace App\Http\Controllers\Regulation;

use Carbon\Carbon;
use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationFile;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
use App\Models\TopLevelIdentity;
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
        $no = 0;
        $database = $request->input();
        if ($request->input('date')) {
            $database['agency'] = Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('Y');
        }
        $dir = 'regulation/';

        $databaseFiles = [];
        $databaseTopLevel = [];
        $idRegulation = Regulation::create($database)->id;
        if ($file) {
            foreach ($file as $key => $value) {
                if ($key == 'upload' || $key == 'akta' || $key == 'other') {
                    foreach ($value as $keys => $values) {
                        $random = Str::random(5);
                        $name = $values->getClientOriginalName();
                        $ext = $values->getClientOriginalExtension();
                        $filename = $name . '-' . $random . '.' . $ext;
                        $values->move($dir, $filename);
                        $databaseFiles[$no]['regulation_id'] = $idRegulation;
                        $databaseFiles[$no]['name'] = $key;
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
        }
        if (isset($database['topLevel']) && count($database['topLevel']) > 0) {
            foreach ($database['topLevel'] as $key => $value) {
                $databaseTopLevel[$key]['regulation_id'] = $idRegulation;
                $databaseTopLevel[$key]['name'] = $value['name'];
                $databaseTopLevel[$key]['country'] = $value['country'];
                $databaseTopLevel[$key]['position'] = $value['position'];
                $databaseTopLevel[$key]['len_service'] = $value['len_service'];
                $databaseTopLevel[$key]['share_amount'] = $value['share_amount'];
            }
            TopLevelIdentity::insert($databaseTopLevel);
        }
        return redirect()->route('legal.regulation.index')->with('message_success', 'Data berhasil di upload.');
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

    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        $no = 0;
        $database = $request->input();
        if ($request->input('date')) {
            $database['agency'] = Carbon::createFromFormat('Y-m-d', $request->input('date'))->format('Y');
        }
        $dir = 'regulation/';
        $data = (array)$database;
        unset($data['_token']);
        unset($data['topLevel']);
        unset($data['action']);
        DB::table('regulations')->where('id', $id)->update($data);

        $databaseFiles = [];
        $databaseTopLevel = [];
        if ($file) {
            foreach ($file as $key => $value) {
                if ($key == 'upload') {
                    foreach ($value as $keys => $values) {
                        $random = Str::random(5);
                        $name = $values->getClientOriginalName();
                        $ext = $values->getClientOriginalExtension();
                        $filename = $name . '-' . $random . '.' . $ext;
                        $values->move($dir, $filename);
                        $databaseFiles[$no]['regulation_id'] = $id;
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
                    $databaseFiles[$no]['regulation_id'] = $id;
                    $databaseFiles[$no]['name'] = $key;
                    $databaseFiles[$no]['filepath'] = $dir . $filename;
                    $no += 1;
                }
            }
            RegulationFile::insert($databaseFiles);
        }
        if (isset($database['topLevel']) && count($database['topLevel']) > 0) {
            foreach ($database['topLevel'] as $key => $value) {
                $databaseTopLevel[$key]['regulation_id'] = $id;
                $databaseTopLevel[$key]['name'] = $value['name'];
                $databaseTopLevel[$key]['country'] = $value['country'];
                $databaseTopLevel[$key]['position'] = $value['position'];
                $databaseTopLevel[$key]['len_service'] = $value['len_service'];
                $databaseTopLevel[$key]['share_amount'] = $value['share_amount'];
            }
            TopLevelIdentity::insert($databaseTopLevel);
        }
        return redirect()->route('legal.regulation.index')->with('message_success', 'Data berhasil diperbaharui.');
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
