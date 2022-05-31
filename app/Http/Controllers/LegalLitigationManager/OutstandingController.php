<?php

namespace App\Http\Controllers\LegalLitigationManager;

use App\Http\Controllers\Controller;
use App\Models\Outstanding;
use Illuminate\Http\Request;

class OutstandingController extends Controller
{
    public function index()
    {
        $data = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->where('status', 'APPROVED BY LEGAL')
            ->orWhere('status', 'RETURNED BY LEGAL')
            ->get();

        return view('pages.legal-litigation-manager.outstanding.index', compact(['data']));
    }

    public function show($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.legal-litigation-manager.outstanding.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function store(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                $item->update([
                    $data,
                    'legal_advice' => $request->legal_advice,
                    'legal_manager_advice' => $request->legal_manager_advice,
                    'status' => 'RETURNED BY LEGAL MANAGER']);

                return redirect()->route('legal-litigation-manager.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                $item->update([
                    $data,
                    'legal_manager_advice' => $request->legal_manager_advice,
                    'status' => 'APPROVED BY LEGAL MANAGER'
                ]);

                return redirect()->route('legal-litigation-manager.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }
}
