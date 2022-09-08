<?php

namespace App\Http\Controllers\Regulation;

use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationFile;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class NormativeController extends Controller
{
    public function index()
    {
        if (request()->ajax())
        {
            $data = Regulation::query()->where('rule_type', 'Normatif');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                    return '
                        <a href="'.route('regulation.normative-detail',[$row->id]).'" class="btn btn-primary justify-content-center">Detail</a>
                    ';
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('pages.user.regulation.normative.index');
    }

    public function indexLegal()
    {
        if (request()->ajax())
        {
            $data = Regulation::query()->where('rule_type', 'Normatif');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                    return '
                        <a href="'.route('legal.regulation.normative-detail',[$row->id]).'" class="btn btn-primary justify-content-center">Detail</a>
                        <a href="'.route('legal.regulation.normative-edit',[$row->id]).'" class="btn btn-primary justify-content-center">Edit</a>
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

        return view('pages.legal.regulation.normative.create',compact('database', 'type'));
    }

    public function store(Request $request)
    {
        $database = $request->all();

        $dir = 'regulation/';

        if ($request->file('ktp_photo')) {
            $file = $request->file('ktp_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['ktp_photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('npwp_photo')) {
            $file = $request->file('npwp_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['npwp_photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('kk_photo')) {
            $file = $request->file('kk_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['kk_photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('passport_photo')) {
            $file = $request->file('passport_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['passport_photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('pas_photo')) {
            $file = $request->file('pas_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['pas_photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('comms_name_file')) {
            $file = $request->file('comms_name_file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['comms_name_file'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('comms_term_file')) {
            $file = $request->file('comms_term_file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['comms_term_file'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('comms_arr_file')) {
            $file = $request->file('comms_arr_file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['comms_arr_file'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('comms_term_arr_file')) {
            $file = $request->file('comms_term_arr_file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['comms_term_arr_file'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('logo_file')) {
            $file = $request->file('logo_file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['logo_file'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $database['photo'] = $dir.$filename;
            $file->move('regulation/', $filename);
        }

        Regulation::create($database);

        $files = $request->file('file_database');
        $ads = $request->file('ads_photo');
        // $photo = $request->file('photo');

        if ($files) {
            foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('regulation', $filename);

            RegulationFile::create([
                'regulation_id' => $database['id'],
                'name' => 'regulation/'.$filename
            ]);
        }
        }

        if ($ads) {
            $name = $ads->getClientOriginalName();
            $filename = $name;
            $ads->move('regulation', $filename);

            RegulationFile::create([
                'regulation_id' => $database['id'],
                'name' => 'regulation/'.$filename
            ]);
        }

        // if ($photo) {
        //     $name = $photo->getClientOriginalName();
        //     $filename = $name;
        //     $photo->move('regulation', $filename);

        //     RegulationFile::create([
        //         'regulation_id' => $database['id'],
        //         'name' => 'regulation/'.$filename
        //     ]);
        // }

        return redirect()->route('legal.regulation.normative-create')->with('message_success', 'File berhasil di upload.');
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

    public function update(Request $request, Regulation $regulation,$id)
    {
        $data = $request->all();

        $regulation = Regulation::where('id',$id)->firstOrFail();

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
                'name' => 'regulation/'.$filename
            ]);
            }
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
