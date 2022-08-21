<?php

namespace App\Http\Controllers\Regulation;

use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
use App\Models\RegulationFile;
use Yajra\DataTables\Facades\DataTables;

class InternalController extends Controller
{
    public function index()
    {
        if (request()->ajax())
        {
            $data = Regulation::query()->where('rule_type', 'Internal');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                    return '
                        <a href="'.route('regulation.internal-detail',[$row->id]).'" class="btn btn-primary justify-content-center">Detail</a>
                    ';
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('pages.user.regulation.internal.index');
    }

    public function indexLegal()
    {
        if (request()->ajax())
        {
            $data = Regulation::query()->where('rule_type', 'Internal');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                    return '
                        <a href="'.route('legal.regulation.internal-detail',[$row->id]).'" class="btn btn-primary justify-content-center">Detail</a>
                        <a href="'.route('legal.regulation.internal-edit',[$row->id]).'" class="btn btn-primary justify-content-center">Edit</a>
                    ';
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('pages.legal.regulation.internal.index');
    }

    public function create()
    {
        $type = RegulationType::query()->where('type', 'Umum')->get();

        return view('pages.legal.regulation.internal.create', [
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // $data ['privilege'] = 'ALL';
        $database = Regulation::create($request->all());

        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = Str::random(40) . '.' . $extension;
        //     $data['file'] = 'Regulation/'.$filename;
        //     $file->move('Regulation', $filename);
        // }

        $files = $request->file('file_database');

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '-' . '.' . $extension;
            $file->move('regulation', $filename);

            RegulationFile::create([
                'regulation_id' => $database->id,
                'name' => 'regulation/'.$filename
            ]);
        }

        // Regulation::create($data);

        return redirect()->route('legal.regulation.internal-create')->with('message_success', 'File berhasil di upload.');
    }

    public function edit($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();
        $type = RegulationType::query()->where('type', 'Umum')->get();

        return view('pages.legal.regulation.internal.edit', [
            'data' => $data,
            'type' => $type
        ]);
    }

    public function update(Request $request, Regulation $regulation,$id)
    {
        $data = $request->all();

        $regulation = Regulation::where('id',$id)->firstOrFail();

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'Regulation/'.$filename;
            $file->move('Regulation', $filename);
        }
        else {
            unset($data['file']);
        }


        $regulation->update($data);

        return redirect()->route('legal.regulation.index')->with('message_success','Berhasil memperbaharui data');;
    }

    public function show($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();

        return view('pages.user.regulation.internal.detail', [
            'data' => $data
        ]);
    }

    public function showLegal($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();

        return view('pages.legal.regulation.internal.detail', [
            'data' => $data
        ]);
    }
}
