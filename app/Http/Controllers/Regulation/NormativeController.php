<?php

namespace App\Http\Controllers\Regulation;

use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationType;
use App\Http\Controllers\Controller;

class NormativeController extends Controller
{
    public function index()
    {
        return view('pages.user.regulation.normative.index');
    }

    public function create()
    {
        $type = RegulationType::query()->where('type', 'Normatif')->get();
        
        return view('pages.user.regulation.normative.create',[
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
            $data['file'] = 'Normatif/'.$filename;
            $file->move('Normatif', $filename);
        }

        Regulation::create($data);

        return redirect()->route('regulation.normative-create')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
