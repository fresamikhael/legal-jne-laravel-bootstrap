<?php

namespace App\Http\Controllers\LegalCorporate;

use App\Models\LandSell;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandSellController extends Controller
{
    public function index()
    {
        $table = LandSell::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::query()->where('id', auth()->user()->id);

        return view('pages.user.legal-corporate.jual-beli-tanah.index', compact('data', 'table'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_certificate')) {
            $file = $request->file('file_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_certificate'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }


        if ($request->file('file_ippt')) {
            $file = $request->file('file_ippt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ippt'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_imb')) {
            $file = $request->file('file_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_imb'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sppt')) {
            $file = $request->file('file_sppt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sppt'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_mom')) {
            $file = $request->file('file_mom');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_mom'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_previous_owner_id')) {
            $file = $request->file('file_previous_owner_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_previous_owner_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_ktp')) {
            $file = $request->file('file_ktp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ktp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_npwp')) {
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_marriage')) {
            $file = $request->file('file_marriage');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_marriage'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_ktp_pasutri')) {
            $file = $request->file('file_ktp_pasutri');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ktp_pasutri'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_death_statement')) {
            $file = $request->file('file_death_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_death_statement'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_heir')) {
            $file = $request->file('file_legal_heir');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_heir'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_heir_id')) {
            $file = $request->file('file_heir_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_heir_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_kk')) {
            $file = $request->file('file_kk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_kk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_internal_memo_legal')) {
            $file = $request->file('file_internal_memo_legal');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo_legal'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_corp')) {
            $file = $request->file('file_legal_corp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_corp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_director_id')) {
            $file = $request->file('file_director_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_npwp')) {
            $file = $request->file('file_legal_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_nib'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_power_attorney')) {
            $file = $request->file('file_power_attorney');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_power_attorney'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        //{}

        if ($request->file('file_location')) {
            $file = $request->file('file_location');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_coordinate')) {
            $file = $request->file('file_coordinate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_coordinate'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_business_case')) {
            $file = $request->file('file_business_case');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_business_case'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_appraisal')) {
            $file = $request->file('file_appraisal');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_appraisal'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        $data['user_id'] = auth()->user()->id;

        LandSell::create($data);

        return redirect()->route('legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function legalIndex()
    {
        $data = LandSell::orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.legal.legal-corporate.jual-beli-tanah.index', compact('data'));
    }

    public function storeLegal(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_certificate')) {
            $file = $request->file('file_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_certificate'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }


        if ($request->file('file_ippt')) {
            $file = $request->file('file_ippt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ippt'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_imb')) {
            $file = $request->file('file_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_imb'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sppt')) {
            $file = $request->file('file_sppt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sppt'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_mom')) {
            $file = $request->file('file_mom');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_mom'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_previous_owner_id')) {
            $file = $request->file('file_previous_owner_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_previous_owner_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_ktp')) {
            $file = $request->file('file_ktp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ktp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_npwp')) {
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_marriage')) {
            $file = $request->file('file_marriage');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_marriage'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_ktp_pasutri')) {
            $file = $request->file('file_ktp_pasutri');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ktp_pasutri'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_death_statement')) {
            $file = $request->file('file_death_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_death_statement'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_heir')) {
            $file = $request->file('file_legal_heir');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_heir'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_heir_id')) {
            $file = $request->file('file_heir_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_heir_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_kk')) {
            $file = $request->file('file_kk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_kk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_internal_memo_legal')) {
            $file = $request->file('file_internal_memo_legal');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo_legal'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_corp')) {
            $file = $request->file('file_legal_corp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_corp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_director_id')) {
            $file = $request->file('file_director_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_npwp')) {
            $file = $request->file('file_legal_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_nib'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_power_attorney')) {
            $file = $request->file('file_power_attorney');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_power_attorney'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        //{}

        if ($request->file('file_location')) {
            $file = $request->file('file_location');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_coordinate')) {
            $file = $request->file('file_coordinate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_coordinate'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_business_case')) {
            $file = $request->file('file_business_case');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_business_case'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_appraisal')) {
            $file = $request->file('file_appraisal');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_appraisal'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        $data['user_id'] = auth()->user()->id;

        LandSell::create($data);

        return redirect()->route('legal.legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function userCheck($id)
    {
        $table = LandSell::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.user.legal-corporate.jual-beli-tanah.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function userCheckPost(Request $request, $id)
    {
        $data = $request->all();

        $item = LandSell::findOrFail($id);

        $item->update([
            $data,
            'user_note' => $request->user_note,
            'status' => 'RETURNED BY USER']);

        return redirect()->route('legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalCheck($id)
    {
        $table = LandSell::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.jual-beli-tanah.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalCheckPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = LandSell::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'RETURNED BY LEGAL CORPORATES']);

                return redirect()->route('legal.legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':
                $data = $request->all();

        

                $item = LandSell::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'APPROVED BY LEGAL CORPORATES'
                ]);

                return redirect()->route('legal.legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }

    public function legalUpdate($id)
    {
        $table = LandSell::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.jual-beli-tanah.update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalUpdatePost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_transaction_deed')) {
            $file = $request->file('file_transaction_deed');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_transaction_deed'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_transaction_certificate')) {
            $file = $request->file('file_transaction_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_transaction_certificate'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        $item = LandSell::findOrFail($id);

        $item->update([
            $data,
            'file_transaction_deed' => $data['file_transaction_deed'],
            'file_transaction_certificate' => $data['file_transaction_certificate'],
            'cb_note' => $request->cb_note,
            'status' => 'APPROVED WITH SCANNED DOCUMENT SENT'
        ]);

        return redirect()->route('legal.legalcorporate.landsell')->with('message_success', 'Terima kasih, Dokumen berhasil dikirim');
    }

    public function userFinal($id)
    {
        $table = LandSell::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.user.legal-corporate.jual-beli-tanah.final', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalFinal($id)
    {
        $table = LandSell::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.legal.legal-corporate.jual-beli-tanah.final', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function headlegalIndex()
    {
        $data = LandSell::where('status', 'APPROVED BY LEGAL CORPORATES')->orWhere('status', 'SENT BY LEGAL CORPORATES')->orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.head-legal.legal-corporate.jual-beli-tanah.index', compact('data'));
    }

    public function headlegalCheck($id)
    {
        $table = LandSell::where('status', 'APPROVED BY LEGAL CORPORATES')->orWhere('status', 'SENT BY LEGAL CORPORATES')->orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = LandSell::where('id', $id)->firstOrFail();
        return view('pages.head-legal.legal-corporate.jual-beli-tanah.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function headlegalCheckPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = LandSell::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'REJECTED BY HEAD OF LEGAL DIVISION']);

                return redirect()->route('headlegal.legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':

                $data = $request->all();

                $item = LandSell::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'APPROVED BY HEAD OF LEGAL DIVISION'
                ]);

                return redirect()->route('headlegal.legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }
}
