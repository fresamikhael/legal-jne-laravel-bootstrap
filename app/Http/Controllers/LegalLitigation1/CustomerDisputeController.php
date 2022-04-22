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
                break;
            default:
                $data['status'] = 'APPROVED BY LEGAL LITIGASI 1';
                break;
        }
    }
}
