<?php

namespace App\Http\Controllers\Regulation;

use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;
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
                        <a href="'.route('regulation.internal-edit',[$row->id]).'" class="btn btn-primary justify-content-center">Edit</a>
                    ';
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('pages.user.regulation.internal.index');
    }

    public function create()
    {
        $type = RegulationType::query()->where('type', 'Internal')->get();
        
        return view('pages.user.regulation.internal.create', [
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data ['rule_type'] = 'Internal';

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'Regulation/'.$filename;
            $file->move('Regulation', $filename);
        }

        Regulation::create($data);

        return redirect()->route('regulation.internal-create')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function edit($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();
        $type = RegulationType::query()->where('type', 'Internal')->get();
        return view('pages.user.regulation.internal.edit', [
            'data' => $data,
            'type' => $type
        ]);
    }

    public function update(Request $request, Regulation $regulation,$id)
    {
        $data = $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'file' => 'required',
        ]);


        $regulation = Regulation::where('id',$id)->firstOrFail();

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'Regulation/'.$filename;
            $file->move('Regulation', $filename);
        }

        
        $regulation->update($data);

        return redirect()->route('regulation.internal')->with('success','Edit Success');;
    }

    public function show($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();

        return view('pages.user.regulation.internal.detail', [
            'data' => $data
        ]);
    }
}
