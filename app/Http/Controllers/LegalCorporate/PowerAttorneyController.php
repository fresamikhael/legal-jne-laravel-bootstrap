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
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::query()->where('id', auth()->user()->id);

        return view('pages.user.legal-corporate.surat-kuasa.index', compact('data', 'table'));
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

        $data['user_id'] = auth()->user()->id;

        PowerAttorney::create($data);

        return redirect()->route('legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function legalIndex()
    {
        $data = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.legal.legal-corporate.surat-kuasa.index', compact('data'));
    }

    public function userCheck($id)
    {
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.user.legal-corporate.surat-kuasa.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function userCheckPost(Request $request, $id)
    {
        $data = $request->all();

        $item = PowerAttorney::findOrFail($id);

        $item->update([
            $data,
            'user_note' => $request->user_note,
            'status' => 'RETURNED BY USER']);

        return redirect()->route('legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalCheck($id)
    {
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.surat-kuasa.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalCheckPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = PowerAttorney::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'RETURNED BY LEGAL CORPORATES']);

                return redirect()->route('legal.legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':

                $data = $request->all();

                // if ($request->file('file_scan_power_attorneys')) {
                //     $file = $request->file('file_scan_power_attorneys');
                //     $extension = $file->getClientOriginalExtension();
                //     $filename = Str::random(40) . '.' . $extension;
                //     $data['file_scan_power_attorneys'] = 'PowerAttorney/'.$filename;
                //     $file->move('PowerAttorney', $filename);
                // }

                $item = PowerAttorney::findOrFail($id);

                $item->update([
                    $data,
                    // 'file_scan_power_attorneys' => $data['file_scan_power_attorneys'],
                    'cb_note' => $request->cb_note,
                    'status' => 'APPROVED BY LEGAL CORPORATES'
                ]);

                return redirect()->route('legal.legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }

    public function legalUpdate($id)
    {
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.surat-kuasa.update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalUpdatePost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_scan_power_attorneys')) {
            $file = $request->file('file_scan_power_attorneys');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_scan_power_attorneys'] = 'PowerAttorney/'.$filename;
            $file->move('PowerAttorney', $filename);
        }

        $item = PowerAttorney::findOrFail($id);

        $item->update([
            $data,
            'file_scan_power_attorneys' => $data['file_scan_power_attorneys'],
            'cb_note' => $request->cb_note,
            'status' => 'APPROVED WITH SCANNED DOCUMENT SENT'
        ]);

        return redirect()->route('legal.legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function userFinal($id)
    {
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.user.legal-corporate.surat-kuasa.final', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalFinal($id)
    {
        $table = PowerAttorney::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.surat-kuasa.final', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function headlegalIndex()
    {
        $data = PowerAttorney::where('status', 'APPROVED BY LEGAL CORPORATES')->orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.head-legal.legal-corporate.surat-kuasa.index', compact('data'));
    }

    public function headlegalCheck($id)
    {
        $table = PowerAttorney::where('status', 'APPROVED BY LEGAL CORPORATES')->orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = PowerAttorney::where('id', $id)->firstOrFail();
        return view('pages.head-legal.legal-corporate.surat-kuasa.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function headlegalCheckPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = PowerAttorney::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'REJECTED BY HEAD OF LEGAL DIVISION']);

                return redirect()->route('headlegal.legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':

                $data = $request->all();

                $item = PowerAttorney::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'APPROVED BY HEAD OF LEGAL DIVISION'
                ]);

                return redirect()->route('headlegal.legalcorporate.powerattorney')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }
}
