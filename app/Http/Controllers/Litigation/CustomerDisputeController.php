<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\Cs;
use App\Models\CustomerDispute;
use Illuminate\Http\Request;

class CustomerDisputeController extends Controller
{
    public function index()
    {
        $data = CustomerDispute::where('user_id', auth()->user()->id)
            ->with('user')
            ->get();

        return view('pages.user.litigation.customer-dispute', compact('data'));
    }

    function store(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_connote')) {
            $file = $request->file('file_connote');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_connote'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion')) {
            $file = $request->file('file_orion');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_pod')) {
            $file = $request->file('file_pod');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_pod'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_customer_case_form')) {
            $file = $request->file('file_customer_case_form');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_customer_case_form'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_destination_chronology')) {
            $file = $request->file('file_destination_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_destination_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion_chronology')) {
            $file = $request->file('file_orion_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_cs_chronology')) {
            $file = $request->file('file_cs_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_cs_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_subpoena')) {
            $file = $request->file('file_subpoena');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_procuration')) {
            $file = $request->file('file_procuration');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_procuration'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $cd = CustomerDispute::create($data);
        Cs::create([
            'form_id' => $cd->id,
            'user_id' => auth()->user()->id,
        ]);
        
        return to_route('litigation.customer-dispute.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
