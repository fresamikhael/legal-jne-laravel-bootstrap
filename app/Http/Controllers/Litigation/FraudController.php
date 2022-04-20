<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\Cs;
use App\Models\Fraud;
use Illuminate\Http\Request;

class FraudController extends Controller
{
    public function index()
    {
        return view('pages.user.litigation.fraud');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;
        
        if ($request->file('file_document_proof')) {
            $file = $request->file('file_document_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_document_proof'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_perpetrator_statement')) {
            $file = $request->file('file_perpetrator_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_perpetrator_statement'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_witness_statement')) {
            $file = $request->file('file_witness_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_witness_statement'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_other'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_evidence_documentation')) {
            $file = $request->file('file_evidence_documentation');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_evidence_documentation'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_investigation_document')) {
            $file = $request->file('file_investigation_document');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_investigation_document'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_other_evidence')) {
            $file = $request->file('file_other_evidence');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_other_evidence'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $fraud = Fraud::create($data);
        Cs::create([
            'form_id' => $fraud->id,
            'user_id' => auth()->user()->id,
        ]);

        return to_route('litigation.fraud.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
