<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\OptionalFile;
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


        $test = Outstanding::create($data);

        $files = $request->file('optional_file');

        foreach ($files as $file) {
            // $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('optional', $filename);

            OptionalFile::create([
                'document_id' => $test->id,
                'name' => $request->optional_name,
                'file' => 'optional/'.$filename
            ]);
        }

        if (auth()->user()->role == 'LEGAL') {
            return to_route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
        } else {
            return to_route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
        }

        // return to_route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function show($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.user.litigation.outstanding.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function showPost(Request $request, $id)
    {
        $data = $request->all();

        $item = Outstanding::findOrFail($id);

        if ($request->file('file_subpoena_signature')) {
            $file = $request->file('file_subpoena_signature');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena_signature'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_delivery_proof')) {
            $file = $request->file('file_delivery_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_delivery_proof'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $item->update([
            $data,
            'file_subpoena_signature' => $data['file_subpoena_signature'],
            'file_delivery_proof' => $data['file_delivery_proof'],
            'status' => 'USER SEND SUBPOENA SIGNATURE'
        ]);

        return to_route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function update($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.user.litigation.outstanding.update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function updatePost(Request $request, $id)
    {

        switch ($request->input('action')) {
            case 'Selesai':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                $item->update([
                    $data,
                    'status' => 'FINISHED BY USER']);

                return redirect()->route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Kirim':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                if ($request->file('file_subpoena_agent_response')) {
                    $file = $request->file('file_subpoena_agent_response');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_subpoena_agent_response'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                $item->update([
                    $data,
                    'file_subpoena_agent_response' => $data['file_subpoena_agent_response'],
                    'user_update' => $data['user_update'],
                    'status' => 'USER SEND SUBPOENA RESPONSE'
                ]);

                return redirect()->route('litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }

    public function updateLegal($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.legal.litigation.outstanding.update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function updateLegalPost(Request $request, $id)
    {
        $data = $request->all();

        $item = Outstanding::findOrFail($id);

        if ($request->file('file_subpoena_2')) {
            $file = $request->file('file_subpoena_2');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena_2'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        if ($request->file('file_agreement_draft')) {
            $file = $request->file('file_agreement_draft');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_agreement_draft'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $item->update([
            $data,
            'file_subpoena_2' => $data['file_subpoena_2'],
            'file_agreement_draft' => $data['file_agreement_draft'],
            'legal_advice' => $data['legal_advice'],
            'status' => 'LEGAL SEND SUBPOENA II'
        ]);

        return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
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

    public function showLegalPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                $item->update([
                    $data,
                    'legal_advice' => $request->legal_advice,
                    'status' => 'RETURNED BY LEGAL']);

                return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                if ($request->file('file_subpoena_draft')) {
                    $file = $request->file('file_subpoena_draft');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_subpoena_draft'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                $item->update([
                    $data,
                    'file_subpoena_draft' => $data['file_subpoena_draft'],
                    'legal_advice' => $request->legal_advice,
                    'status' => 'APPROVED BY LEGAL'
                ]);

                return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }

    public function progressLegal($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.legal.litigation.outstanding.progress', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function progressLegalPost(Request $request, $id)
    {
        $data = $request->all();

        $item = Outstanding::findOrFail($id);

        if ($request->file('file_subpoena_signature')) {
            $file = $request->file('file_subpoena_signature');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena_signature'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $item->update([
            $data,
            'file_subpoena_signature' => $data['file_subpoena_signature'],
            'status' => 'PROGRESS SENT BY LEGAL'
        ]);

        return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function finishLegal($id)
    {
        $table = Outstanding::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Outstanding::where('id', $id)->firstOrFail();
        return view('pages.legal.litigation.outstanding.finish', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function finishLegalPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Selesai':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                $item->update([
                    $data,
                    'status' => 'FINISHED BY LEGAL']);

                return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Proses Gugatan':
                $data = $request->all();

                $item = Outstanding::findOrFail($id);

                if ($request->file('file_court_lawsuit')) {
                    $file = $request->file('file_court_lawsuit');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_court_lawsuit'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                $item->update([
                    $data,
                    'file_court_lawsuit' => $data['file_court_lawsuit'],
                    'status' => 'COURT LAWSUIT BY LEGAL'
                ]);

                return redirect()->route('legal.litigation.outstanding.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }
}
