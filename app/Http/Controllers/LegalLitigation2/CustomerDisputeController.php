<?php

namespace App\Http\Controllers\LegalLitigation2;

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
            ->where('status', 'APPROVED BY LEGAL LITIGASI 1')
            ->get();
            
        $cs = Cs::orderBy('id', 'DESC')
            ->where('status', 'APPROVED BY LEGAL LITIGASI 1')
            ->get();

        return view('pages.legal-litigation-2.customer-dispute.index', compact(['data', 'cs']));
    }

    public function show($id)
    {
        $data = CustomerDispute::where('id', $id)->with('user')->first();
        $cs = Cs::where('form_id', $id)->first();

        return view('pages.legal-litigation-2.customer-dispute.check', compact(['data', 'cs']));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        switch ($request->input('action')) {
            case 'return':
                $data['status'] = 'RETURNED BY LEGAL LITIGASI 2';
                
                Cs::where('form_id', $id)->update([
                    'status' => $data['status']
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return to_route('legal-litigation-2.customer-dispute.index');
                break;
            case 'approve':
                $data['status'] = 'APPROVED BY LEGAL LITIGASI 2';

                Cs::where('form_id', $id)->update([
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return to_route('legal-litigation-2.customer-dispute.index');
                break;
            default:
                return to_route('legal-litigation-2.customer-dispute.index');
                break;
        }
    }
}
