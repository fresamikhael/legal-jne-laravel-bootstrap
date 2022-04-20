<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\Cs;
use App\Models\Outstanding;
use Illuminate\Http\Request;

class OutstandingController extends Controller
{
    public function index()
    {
        return view('pages.user.litigation.outstanding');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_pcrf')) {
            $file = $request->file('file_pcrf');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_pcrf'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_recapitulation')) {
            $file = $request->file('file_recapitulation');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_recapitulation'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_packing_list')) {
            $file = $request->file('file_packing_list');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_packing_list'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_billing_proof')) {
            $file = $request->file('file_billing_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_billing_proof'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_deed_company')) {
            $file = $request->file('file_deed_company');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_deed_company'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_nib'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_other'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $outstanding = Outstanding::create($data);
        Cs::create([
            'form_id' => $outstanding->id,
            'user_id' => auth()->user()->id,
        ]);

        return to_route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
