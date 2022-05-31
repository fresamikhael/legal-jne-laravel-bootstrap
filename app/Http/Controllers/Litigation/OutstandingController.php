<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\Outstanding;
use Illuminate\Http\Request;

class OutstandingController extends Controller
{
    public function index()
    {
        $data = Outstanding::where('user_id', auth()->user()->id)
                ->with('user')
                ->get();

        return view('pages.user.litigation.outstanding.index', compact('data'));
    }

    public function indexLegal()
    {
        $data = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.legal.litigation.outstanding.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_management_disposition')) {
            $file = $request->file('file_management_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_management_disposition'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_deed_of_incoporation')) {
            $file = $request->file('file_deed_of_incoporation');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_deed_of_incoporation'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_sk_menkumham')) {
            $file = $request->file('file_sk_menkumham');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_sk_menkumham'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_director_id_card')) {
            $file = $request->file('file_director_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_director_id_card'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_npwp')) {
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_npwp'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_nib'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_business_permit')) {
            $file = $request->file('file_business_permit');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_business_permit'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_location_permit')) {
            $file = $request->file('file_location_permit');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_location_permit'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_outstanding_recap')) {
            $file = $request->file('file_outstanding_recap');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_outstanding_recap'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_billing_letter')) {
            $file = $request->file('file_billing_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_billing_letter'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        Outstanding::create($data);

        return to_route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function show($id)
    {
        $ost = Outstanding::where('id', $id)->first();

        return view('pages.user.litigation.show-outstanding', compact('ost'));
    }

    public function showLegal($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.legal.litigation.outstanding.check', [
            'data' => $data,
            'table' => $table
        ]);
    }
}
