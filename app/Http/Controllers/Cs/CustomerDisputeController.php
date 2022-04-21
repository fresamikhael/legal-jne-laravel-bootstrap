<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {

    }
}
