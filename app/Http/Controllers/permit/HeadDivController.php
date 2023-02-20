<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\PermitFile;
use App\Models\PermitHistory;
use App\Models\User;
use Illuminate\Http\Request;

class HeadDivController extends Controller
{
    public function index()
    {
        $data = [];
        $permit = Permit::all();
        foreach ($permit as $key => $value) {
            $permit[$key]['history'] = PermitHistory::where(
                'permit_id',
                $value->id
            )
                ->orderBy('created_at', 'desc')
                ->limit(1)
                ->first();
            $permit[$key]['user_submited'] = User::query()
                ->where('id', $value->user_id)
                ->firstOrFail()->name;
            if (
                $permit[$key]['history']->to_level == 'HEAD-DIV' ||
                ($permit[$key]['history']->from_level == 'HEAD-DIV' &&
                    ($permit[$key]['history']->status == 'return' ||
                        $permit[$key]['history']->status == 'approve'))
            ) {
                $data[] = $permit[$key];
            }
        }

        return view('pages.head-div.permit.index', [
            'data' => $data,
        ]);
    }

    public function detail($id)
    {
        $permit = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        $permitHistory = PermitHistory::query()
            ->where('permit_id', $id)
            ->OrderBy('created_at', 'ASC')
            ->get();
        $permitFile = PermitFile::query()
            ->where('permit_id', $id)
            ->OrderBy('created_at', 'ASC')
            ->get();
        $lastHistory = PermitHistory::where('permit_id', $id)
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->first();
        if ($lastHistory->to_level == 'HEAD-DIV') {
            if ($permit->permit_model == 'permohonan') {
                return view('pages.head-div.permit.edit_permohonan', [
                    'permit' => $permit,
                    'permitHistory' => $permitHistory,
                    'permitFile' => $permitFile,
                ]);
            }

            return view('pages.head-div.permit.edit_perpanjangan', [
                'permit' => $permit,
                'permitHistory' => $permitHistory,
                'permitFile' => $permitFile,
            ]);
        }

        if ($permit->permit_model == 'permohonan') {
            return view('pages.head-div.permit.detail_permohonan', [
                'permit' => $permit,
                'permitHistory' => $permitHistory,
                'permitFile' => $permitFile,
            ]);
        }

        return view('pages.head-div.permit.detail_perpanjangan', [
            'permit' => $permit,
            'permitHistory' => $permitHistory,
            'permitFile' => $permitFile,
        ]);
    }

    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'return':
                $data = $request->validate([
                    'note' => 'required',
                ]);
                $data['status'] = 'RETURN';
                $data['legal_id'] = auth()->user()->id;
                $item = Permit::where('id', $id)->firstOrFail();
                $user = User::where('id', $item->user_id)->firstOrFail();

                $dataHistory['permit_id'] = $id;
                $dataHistory['status'] = 'return';
                $dataHistory['user_submited'] = auth()->user()->name;
                $dataHistory['from_level'] = 'HEAD-DIV';
                $dataHistory['to_level'] = 'USER';
                $dataHistory['notes'] = $data['note'];
                PermitHistory::create($dataHistory);

                $item->update($data);
                $mailData = [
                    'title' => 'New Permit has been rejected',
                    'body' =>
                        'Permit Baru Telah Dikembalikan Dengan Nomor Pengajuan ' .
                        $id .
                        ' Oleh ' .
                        auth()->user()->name,
                    'subject' => 'New Permit Has Been Rejected',
                    'url' => url('/permit/perizinan-baru/detail/' . $id),
                ];

                // Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
                // Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('headdiv.permit.index');
                break;

            case 'approve':
                $data = $request->validate([
                    'note' => 'required',
                ]);
                $data['status'] = 'CLOSED';
                $data['legal_id'] = auth()->user()->id;

                $item = Permit::findOrFail($id);

                $item->update($data);

                $dataHistory['permit_id'] = $id;
                $dataHistory['status'] = 'approve';
                $dataHistory['user_submited'] = auth()->user()->name;
                $dataHistory['from_level'] = 'HEAD-DIV';
                $dataHistory['to_level'] = 'HEAD-DIV';
                $dataHistory['notes'] = $data['note'];
                PermitHistory::create($dataHistory);

                $user = User::where('id', $item->user_id)->firstOrFail();

                $mailData = [
                    'title' => 'New Permit Approved',
                    'body' =>
                        'Permit Baru Telah Disetujui Dengan Nomor Pengajuan ' .
                        $id .
                        ' Oleh ' .
                        auth()->user()->name,
                    'subject' => 'New Permit Has Been Approved',
                    'url' => url('/permit/perizinan-baru/detail/' . $id),
                ];
                // Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
                // Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('headdiv.permit.index');
                break;
        }
    }
}
