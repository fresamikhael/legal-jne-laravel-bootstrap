<?php

namespace App\Http\Controllers\LegalCorporate;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PowerAttorney;
use App\Http\Controllers\Controller;

class PowerAttorneyController extends Controller
{
    public function index()
    {
        return view('pages.user.legal-corporate.surat-kuasa.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'PowerAttorney/'.$filename;
            $file->move('PowerAttorney', $filename);
        }

        if ($request->file('file_supporting_document')) {
            $file = $request->file('file_supporting_document');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_supporting_document'] = 'PowerAttorney/'.$filename;
            $file->move('PowerAttorney', $filename);
        }

        if ($request->file('file_endorsee_id')) {
            $file = $request->file('file_endorsee_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_endorsee_id'] = 'PowerAttorney/'.$filename;
            $file->move('PowerAttorney', $filename);
        }

        PowerAttorney::create($data);

        return redirect()->route('legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
