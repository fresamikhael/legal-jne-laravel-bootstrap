<?php

namespace App\Http\Controllers\LegalLitigation1;

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
            ->whereNotIn('status', ['PENDING'])
            ->get();

        $cs = Cs::orderBy('id', 'DESC')
            ->whereNotIn('status', ['PENDING'])
            ->get();

        return view('pages.legal-litigation-1.customer-dispute.index', compact(['data', 'cs']));
    }

    public function show($id)
    {
        $data = CustomerDispute::where('id', $id)->with('user')->first();
        $cs = Cs::where('form_id', $id)->first();

        return view('pages.legal-litigation-1.customer-dispute.check', compact(['data', 'cs']));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        switch ($request->input('action')) {
            case 'return':
                $data['status'] = 'RETURNED BY LEGAL LITIGASI 1';
                
                Cs::where('form_id', $id)->update([
                    'note' => $data['note'],
                    'status' => $data['status']
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return to_route('legal-litigation-1.customer-dispute.index');
                break;
            case 'approve':
                $data['status'] = 'APPROVED BY LEGAL LITIGASI 1';

                if ($request->file('file_subpoena_responese_draft')) {
                    $file = $request->file('file_subpoena_responese_draft');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_subpoena_responese_draft'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename); 
                }

                Cs::where('form_id', $id)->update([
                    'file_subpoena_responese_draft' => $data['file_subpoena_responese_draft'],
                    'case_analysis' => $data['case_analysis'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return to_route('legal-litigation-1.customer-dispute.index');
                break;
            default:
                return to_route('legal-litigation-1.customer-dispute.index');
                break;
        }
    }
}
