<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use App\Models\Cs;
use App\Models\CustomerDispute;
use Illuminate\Http\Request;

class CustomerDisputeController extends Controller
{
    public function index()
    {
        $data = CustomerDispute::orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.cs.customer-dispute.index', compact('data'));
    }

    public function show($id)
    {
        $data = CustomerDispute::where('id', $id)->with('user')->first();

        return view('pages.cs.customer-dispute.check', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        $cs = Cs::where('form_id', $id)->first();

        if ($request->note) {
            $data['status'] = 'DIPERBAIKI OLEH CS';
        } else {
            $data['status'] = 'DILENGKAPI OLEH CS';
        }

        if ($request->nominal_indemnity_offer) {
            $data['nominal_indemnity_offer'] = $request->nominal_indemnity_offer;
        } else {
            $data['nominal_indemnity_offer'] = $cs->nominal_indemnity_offer;
        }

        if ($request->file('file_consumer_dispute_case_form')) {
            $file = $request->file('file_consumer_dispute_case_form');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_consumer_dispute_case_form'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_consumer_dispute_case_form'] = $cs->file_consumer_dispute_case_form;
        }
        if ($request->file('file_operational_delivery_chronology')) {
            $file = $request->file('file_operational_delivery_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_operational_delivery_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_operational_delivery_chronology'] = $cs->file_operational_delivery_chronology;
        }
        if ($request->file('file_cs_handling_chronology')) {
            $file = $request->file('file_cs_handling_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_cs_handling_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_cs_handling_chronology'] = $cs->file_cs_handling_chronology;
        }
        if ($request->file('file_pod_evidence')) {
            $file = $request->file('file_pod_evidence');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_pod_evidence'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_pod_evidence'] = $cs->file_pod_evidence;
        }
        if ($request->file('file_receipt_proof')) {
            $file = $request->file('file_receipt_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_receipt_proof'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_receipt_proof'] = $cs->file_receipt_proof;
        }
        if ($request->file('file_proof_of_documentation1')) {
            $file = $request->file('file_proof_of_documentation1');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_proof_of_documentation1'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_proof_of_documentation1'] = $cs->file_proof_of_documentation1;
        }
        if ($request->file('file_proof_of_documentation2')) {
            $file = $request->file('file_proof_of_documentation2');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_proof_of_documentation2'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_proof_of_documentation2'] = $cs->file_proof_of_documentation2;
        }
        if ($request->file('file_proof_of_documentation3')) {
            $file = $request->file('file_proof_of_documentation3');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_proof_of_documentation3'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_proof_of_documentation3'] = $request->file_proof_of_documentation3;
        }
        if ($request->file('file_other_supporting_document')) {
            $file = $request->file('file_other_supporting_document');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_other_supporting_document'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        } else {
            $data['file_other_supporting_document'] = $cs->file_other_supporting_document;
        }

        Cs::where('form_id', $id)->update([
            'user_id' => $data['user_id'],
            'file_consumer_dispute_case_form' => $data['file_consumer_dispute_case_form'],
            'file_operational_delivery_chronology' => $data['file_operational_delivery_chronology'],
            'file_cs_handling_chronology' => $data['file_cs_handling_chronology'],
            'file_pod_evidence' => $data['file_pod_evidence'],
            'file_receipt_proof' => $data['file_receipt_proof'],
            'file_proof_of_documentation1' => $data['file_proof_of_documentation1'],
            'file_proof_of_documentation2' => $data['file_proof_of_documentation2'],
            'file_proof_of_documentation3' => $data['file_proof_of_documentation3'],
            'file_other_supporting_document' => $data['file_other_supporting_document'],
            'nominal_indemnity_offer' => $data['nominal_indemnity_offer'],
            'status' => $data['status'],
        ]);

        CustomerDispute::where('id', $id)->update([
            'status' => $data['status']
        ]);
        
        return to_route('cs.customer-dispute.show', [$id])->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function finish(Request $request, $id)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        $data['status'] = 'UPDATE BY CS';

        if ($request->file('file_response_letter')) {
            $file = $request->file('file_response_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_response_letter'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_proof_shipment')) {
            $file = $request->file('file_proof_shipment');
            $extension = $file->getClientOriginalExtension();
                $filename = str()->random(40) . '.' . $extension;
            $data['file_proof_shipment'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        Cs::where('form_id', $id)->update([
            'user_id' => $data['user_id'],
            'file_response_letter' => $data['file_response_letter'],
            'file_proof_shipment' => $data['file_proof_shipment'],
            'status' => $data['status'],
        ]);

        CustomerDispute::where('id', $id)->update([
            'status' => $data['status']
        ]);
        
        return to_route('cs.customer-dispute.show', [$id])->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
    
    public function close(Request $request, $id)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_acceptance_letter')) {
            $file = $request->file('file_acceptance_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_acceptance_letter'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_case_report')) {
            $file = $request->file('file_case_report');
            $extension = $file->getClientOriginalExtension();
                $filename = str()->random(40) . '.' . $extension;
            $data['file_case_report'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_invoice')) {
            $file = $request->file('file_invoice');
            $extension = $file->getClientOriginalExtension();
                $filename = str()->random(40) . '.' . $extension;
            $data['file_invoice'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        Cs::where('form_id', $id)->update([
            'user_id' => $data['user_id'],
            'file_acceptance_letter' => $data['file_acceptance_letter'],
            'file_case_report' => $data['file_case_report'],
            'file_invoice' => $data['file_invoice'],
            'status' => strtoupper($data['status']),
        ]);

        CustomerDispute::where('id', $id)->update([
            'status' => strtoupper($data['status'])
        ]);
        
        return to_route('cs.customer-dispute.show', [$id])->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
