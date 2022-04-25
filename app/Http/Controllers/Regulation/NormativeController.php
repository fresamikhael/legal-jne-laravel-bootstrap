<?php

namespace App\Http\Controllers\Regulation;

use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $type = RegulationType::query()->where('type', 'Normatif')->get();
        
        return view('pages.legal.regulation.normative.create',[
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data ['rule_type'] = 'Normatif';

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'Regulation/'.$filename;
            $file->move('Regulation', $filename);
        }

        Regulation::create($data);

        return redirect()->route('legal.regulation.normative-create')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function edit($id)
    {
        $data = Regulation::where('id', $id)->firstOrFail();
        $type = RegulationType::query()->where('type', 'Normatif')->get();
        return view('pages.legal.regulation.normative.edit', [
            'data' => $data,
            'type' => $type
        ]);
    }

    public function update(Request $request, Regulation $regulation,$id)
    {
        $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'type' => 'required',
            // 'file' => 'required',
        ]);

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

        return redirect()->route('legal.regulation.normative')->with('message_success','Berhasil memperbaharui data');;
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
