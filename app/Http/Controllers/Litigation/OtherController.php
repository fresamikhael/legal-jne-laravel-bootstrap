<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\OtherLitigation;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        return view('pages.user.litigation.other');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_document')) {
            $file = $request->file('file_document');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_document'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_proof')) {
            $file = $request->file('file_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_proof'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $other = OtherLitigation::create($data);

        return to_route('litigation.other.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
