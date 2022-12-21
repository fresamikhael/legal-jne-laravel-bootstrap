<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Mail\MailJNE;
use App\Mail\MailUPDATE;
use App\Models\Permit;
use App\Models\PermitHistory;
use App\Models\User;
// use App\Models\Permit\Permit as PermitPermit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewPermitController extends Controller
{
    public function home()
    {
        return View('pages.user.permit.index');
    }

    public function newPermit()
    {
        return View('pages.legal.permit.perizinan-baru.newPermit');
    }

    public function extendPermit()
    {
        return View('pages.legal.permit.extend');
    }

    public function imb()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perizinan-baru.imb', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function slf()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perizinan-baru.slf', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function extendslf()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perpanjangan.slf', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function oss()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perizinan-baru.oss', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function reklame()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perizinan-baru.reklame', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function extendreklame()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();

        return View('pages.legal.permit.perpanjangan.reklame', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function index()
    {
        $data = Permit::where('user_id', auth()->user()->id)
            ->where('permit_model', 'permohonan')
            ->get();

        return view('pages.user.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,
        ]);
    }
    public function index_prolongation()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();

        return view('pages.legal.permit.perpanjangan.perpanjangan', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_me')) {
            $file = $request->file('file_me');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_me'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_architect')) {
            $file = $request->file('file_architect');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_architect'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_technical')) {
            $file = $request->file('file_technical');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_technical'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_photo')) {
            $file = $request->file('file_building_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ads_photo')) {
            $file = $request->file('file_ads_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ads_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_statement_letter')) {
            $file = $request->file('file_statement_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_statement_letter'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_ownership')) {
            $file = $request->file('file_building_ownership');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_ownership'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_pbb')) {
            $file = $request->file('file_pbb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_pbb'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ownership_statement')) {
            $file = $request->file('file_ownership_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ownership_statement'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_tlbbr')) {
            $file = $request->file('file_tlbbr');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_tlbbr'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_location_polygon')) {
            $file = $request->file('file_location_polygon');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location_polygon'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_oss_form')) {
            $file = $request->file('file_oss_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_form'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $id = Permit::create($data)->id;
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'submit';
        $dataHistory['user_submited'] = auth()->user()->name;
        PermitHistory::create($dataHistory);
        $mailData = [
            'title' => 'New Permit Submited',
            'body' =>
                'Permit Baru Telah Dibuat Dengan Nomor Kasus ' .
                $id .
                ' Dibuat Oleh ' .
                auth()->user()->name,
            'subject' => 'New Permit Has Been Submited',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];
        Mail::to('devabdan@gmail.com')->send(new MailJNE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        if (auth()->user()->role == 'LEGAL') {
            return redirect()
                ->route('legal.permit.index')
                ->with(
                    'message_success',
                    'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.'
                );
        } else {
            return redirect()
                ->route('permit.newpermit')
                ->with(
                    'message_success',
                    'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.'
                );
        }
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

        return view('pages.user.permit.perizinan-baru.detail', [
            'permit' => $permit,
            'permitHistory' => $permitHistory,
        ]);
    }

    public function edit($id)
    {
        $data = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.edit', [
            'data' => $data,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // $id_permit = $data['id'];
        // $data = $request->validate([
        //     // 'user_id' => 'required',
        //     'permit_type' => 'required',
        //     'location' => 'required',
        //     'specification' => 'required',
        //     'application_reason' => 'required',
        //     'file_disposition' => 'required',
        //     'file_document1' => 'required',
        //     'file_document2' => 'required',
        //     'file_document3' => 'required',
        // ]);
        $data['status'] = 'PENDING';
        $data['note'] = '';

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_me')) {
            $file = $request->file('file_me');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_me'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_architect')) {
            $file = $request->file('file_architect');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_architect'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_technical')) {
            $file = $request->file('file_technical');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_technical'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_photo')) {
            $file = $request->file('file_building_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ads_photo')) {
            $file = $request->file('file_ads_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ads_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_statement_letter')) {
            $file = $request->file('file_statement_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_statement_letter'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_ownership')) {
            $file = $request->file('file_building_ownership');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_ownership'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_pbb')) {
            $file = $request->file('file_pbb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_pbb'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ownership_statement')) {
            $file = $request->file('file_ownership_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ownership_statement'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_tlbbr')) {
            $file = $request->file('file_tlbbr');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_tlbbr'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_location_polygon')) {
            $file = $request->file('file_location_polygon');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location_polygon'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_oss_form')) {
            $file = $request->file('file_oss_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_form'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'Resubmited';
        $dataHistory['user_submited'] = auth()->user()->name;
        PermitHistory::create($dataHistory);
        $mailData = [
            'title' => '' . $item->permit_type . ' permit has been resubmited',
            'body' =>
                'Permit Telah Diperbaharui Dengan Nomor Kasus ' .
                $id .
                ' Dibuat Oleh ' .
                auth()->user()->name,
            'subject' => 'Permit Has Been Resubmited',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailJNE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        return redirect()->route('permit.newpermit');
    }

    public function confirm_skpd(Request $request, $id)
    {
        $data = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.confirm_skpd', [
            'data' => $data,
        ]);
    }

    public function confirm_skpd_update(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            'cost_control' => 'required',
            'note' => 'required',
        ]);

        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);

        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'SKPD Confirmed';
        $dataHistory['user_submited'] = auth()->user()->name;
        $dataHistory['notes'] = $data['note'];
        PermitHistory::create($dataHistory);

        $mailData = [
            'title' => 'Update from user',
            'body' =>
                'SKPD telah masuk ke Cost control, mohon untuk memonitoring Cost control',
            'subject' => 'Update From User',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        return redirect()->route('permit.newpermit');
    }

    public function index_legal()
    {
        $data = Permit::where('user_id', auth()->user()->id)->get();
        $data2 = Permit::all();
        return view('pages.legal.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function legal_index()
    {
        $data = Permit::all();
        foreach ($data as $key => $value) {
            $data[$key]['user_submited'] = User::query()
                ->where('id', $value->user_id)
                ->firstOrFail()->name;
        }
        return view('pages.legal.permit.index', [
            'data' => $data,
        ]);
    }

    public function store_legal(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'permit_type' => 'required',
        //     'location' => 'required',
        //     'specification' => 'required',
        //     'application_reason' => 'required',
        //     'file_disposition' => 'required',
        //     'file_document1' => 'required',
        //     'file_document2' => 'required',
        //     'file_document3' => 'required',
        // ]);
        // ]);
        $data = $request->all();

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_me')) {
            $file = $request->file('file_me');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_me'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_architect')) {
            $file = $request->file('file_architect');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_architect'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_technical')) {
            $file = $request->file('file_technical');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_technical'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_photo')) {
            $file = $request->file('file_building_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ads_photo')) {
            $file = $request->file('file_ads_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ads_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_statement_letter')) {
            $file = $request->file('file_statement_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_statement_letter'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_ownership')) {
            $file = $request->file('file_building_ownership');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_ownership'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_pbb')) {
            $file = $request->file('file_pbb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_pbb'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ownership_statement')) {
            $file = $request->file('file_ownership_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ownership_statement'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_tlbbr')) {
            $file = $request->file('file_tlbbr');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_tlbbr'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_location_polygon')) {
            $file = $request->file('file_location_polygon');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location_polygon'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_oss_form')) {
            $file = $request->file('file_oss_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_form'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $id = Permit::create($data)->id;
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'Submited';
        $dataHistory['user_submited'] = auth()->user()->name;
        PermitHistory::create($dataHistory);
        $mailData = [
            'title' => 'New Permit Submited',
            'body' =>
                'Permit Baru Telah Dibuat Dengan Nomor Kasus ' .
                $id .
                ' Dibuat Oleh ' .
                auth()->user()->name,
            'subject' => 'New Permit Has Been Submited',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailJNE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        return redirect()->route('legal.permit.index');
    }

    public function perpanjanganStore(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'permit_type' => 'required',
        //     'location' => 'required',
        //     'specification' => 'required',
        //     'application_reason' => 'required',
        //     'file_disposition' => 'required',
        //     'file_document1' => 'required',
        //     'file_document2' => 'required',
        //     'file_document3' => 'required',
        // ]);
        // ]);
        $data = $request->all();

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_me')) {
            $file = $request->file('file_me');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_me'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_architect')) {
            $file = $request->file('file_architect');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_architect'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_technical')) {
            $file = $request->file('file_technical');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_technical'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_photo')) {
            $file = $request->file('file_building_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ads_photo')) {
            $file = $request->file('file_ads_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ads_photo'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_statement_letter')) {
            $file = $request->file('file_statement_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_statement_letter'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_building_ownership')) {
            $file = $request->file('file_building_ownership');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_building_ownership'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_pbb')) {
            $file = $request->file('file_pbb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_pbb'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_ownership_statement')) {
            $file = $request->file('file_ownership_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ownership_statement'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_tlbbr')) {
            $file = $request->file('file_tlbbr');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_tlbbr'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_location_polygon')) {
            $file = $request->file('file_location_polygon');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location_polygon'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_oss_form')) {
            $file = $request->file('file_oss_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_form'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_imb')) {
            $file = $request->file('file_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_imb'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_old_slf')) {
            $file = $request->file('file_old_slf');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_old_slf'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_payment_proof')) {
            $file = $request->file('file_payment_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_payment_proof'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_old_skpd')) {
            $file = $request->file('file_old_skpd');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_old_skpd'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $id = Permit::create($data)->id;
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'submited';
        $dataHistory['user_submited'] = auth()->user()->name;
        PermitHistory::create($dataHistory);
        $mailData = [
            'title' => 'New Permit Submited',
            'body' =>
                'Permit Baru Telah Dibuat Dengan Nomor Kasus ' .
                $id .
                ' Dibuat Oleh ' .
                auth()->user()->name,
            'subject' => 'New Permit Has Been Submited',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailJNE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        if (auth()->user()->role == 'LEGAL') {
            return redirect()->route('legal.permit.prolongation');
        } else {
            return redirect()->route('perpanjangan.prolongation');
        }
    }

    public function check_legal($id)
    {
        $permit = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.check', [
            'permit' => $permit,
        ]);
    }

    public function store_check_legal(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'return':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'legal_id' => 'required',
                    'note' => 'required',
                    // 'status' => 'required'
                ]);

                // $regulation = Regulation::where('id', $id)->firstOrFail();
                // 'status' => 'RETURN'
                $data['status'] = 'RETURN';
                $item = Permit::where('id', $id)->firstOrFail();
                $user = User::where('id', $item->user_id)->firstOrFail();

                $dataHistory['permit_id'] = $id;
                $dataHistory['status'] = 'return';
                $dataHistory['user_submited'] = auth()->user()->name;
                $dataHistory['notes'] = $data['note'];
                PermitHistory::create($dataHistory);

                $item->update($data);
                $mailData = [
                    'title' => 'New Permit has been rejected',
                    'body' =>
                        'Permit Baru Telah Dikembalikan Dengan Nomor Kasus ' .
                        $id .
                        ' Oleh ' .
                        auth()->user()->name,
                    'subject' => 'New Permit Has Been Rejected',
                    'url' => url('/permit/perizinan-baru/detail/' . $id),
                ];

                Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
                // Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('legal.permit.index');
                break;

            case 'approve':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'legal_id' => 'required',
                    'note' => 'required',
                    // 'status' => 'IN PROGRESS'
                ]);
                $data['status'] = 'IN PROGRESS';

                $item = Permit::findOrFail($id);

                $item->update($data);

                $dataHistory['permit_id'] = $id;
                $dataHistory['status'] = 'approve';
                $dataHistory['user_submited'] = auth()->user()->name;
                $dataHistory['notes'] = $data['note'];
                PermitHistory::create($dataHistory);

                $user = User::where('id', $item->user_id)->firstOrFail();

                $mailData = [
                    'title' => 'New Permit Approved',
                    'body' =>
                        'Permit Baru Telah Disetujui Dengan Nomor Kasus ' .
                        $id .
                        ' Oleh ' .
                        auth()->user()->name,
                    'subject' => 'New Permit Has Been Approved',
                    'url' => url('/permit/perizinan-baru/detail/' . $id),
                ];
                Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
                // Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('legal.permit.index');
                break;
        }
    }

    public function detail_legal($id)
    {
        $permit = Permit::query()
            ->where('id', $id)
            ->firstOrFail();

        $permitHistory = PermitHistory::query()
            ->where('permit_id', $id)
            ->OrderBy('created_at', 'ASC')
            ->get();

        return view('pages.legal.permit.perizinan-baru.detail', [
            'permit' => $permit,
            'permitHistory' => $permitHistory,
        ]);
    }

    public function upload_skpd_legal($id)
    {
        $data = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.upload_skpd', [
            'data' => $data,
        ]);
    }
    public function update_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            // 'user_id' => 'required',
            // 'permit_type' => 'required',
            // 'location' => 'required',
            // 'specification' => 'required',
            // 'application_reason' => 'required',
            // 'file_disposition' => 'required',
            // 'file_document1' => 'required',
            // 'file_document2' => 'required',
            // 'file_document3' => 'required',
            'latest_skpd' => 'required',
            'note' => 'required',
        ]);

        if ($request->file('latest_skpd')) {
            $file = $request->file('latest_skpd');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['latest_skpd'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);

        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'SKPD Updated';
        $dataHistory['user_submited'] = auth()->user()->name;
        $dataHistory['notes'] = $data['note'];
        PermitHistory::create($dataHistory);
        $user = User::where('id', $item->user_id)->firstOrFail();

        $mailData = [
            'title' => 'Update From Legal',
            'body' => 'Legal telah mengupload SKPD',
            'subject' => 'Update From Legal',
            'url' => url('/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
        // Mail::to($user->email)->send(new MailUPDATE($mailData));

        // $datenow = date('y-m-d', strtotime(Carbon::now()));

        return redirect()->route('legal.permit.index');
    }

    public function confirm_skpd_legal(Request $request, $id)
    {
        $data = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.confirm_skpd', [
            'data' => $data,
        ]);
    }

    public function confirm_skpd_update_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            'cost_control' => 'required',
            'note' => 'required',
        ]);

        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'SKPD Confirmed';
        $dataHistory['user_submited'] = auth()->user()->name;
        $dataHistory['notes'] = $data['note'];
        PermitHistory::create($dataHistory);

        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'Update From User',
            'body' =>
                'SKPD telah masuk ke Cost Control, mohon untuk memonitoring Cost Control',
            'subject' => 'Update From User',
            'url' => url('/legal/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
        $dataLegal = User::where('role', 'LEGAL')->get();
        // foreach ($dataLegal as $key => $value) {
        //     Mail::to($value->email)->send(new MailJNE($mailData));
        // }

        return redirect()->route('legal.permit.index');
    }

    public function upload_skpd_invoice_legal($id)
    {
        $data = Permit::query()
            ->where('id', $id)
            ->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.upload_skpd_invoice', [
            'data' => $data,
        ]);
    }
    public function update_invoice_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            'expired' => 'required',
            'latest_skpd' => 'required',
            'proof_of_payment' => 'required',
            'note' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('latest_skpd')) {
            $file = $request->file('latest_skpd');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['latest_skpd'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('proof_of_payment')) {
            $file = $request->file('proof_of_payment');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['proof_of_payment'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        $dataHistory['permit_id'] = $id;
        $dataHistory['status'] = 'SKPD Paid';
        $dataHistory['user_submited'] = auth()->user()->name;
        $dataHistory['notes'] = $data['note'];
        PermitHistory::create($dataHistory);
        $user = User::where('id', $item->user_id)->firstOrFail();
        $mailData = [
            'title' => 'Update From Legal',
            'body' =>
                'Permohonan pengajuan reklame telah selesai, Silahkan download file SKPD sebagai arsip apablia ada pemeriksaan dari instansi berwenang.',
            'subject' => 'Update From Legal',
            'url' => url('/permit/perizinan-baru/detail/' . $id),
        ];

        Mail::to('devabdan@gmail.com')->send(new MailUPDATE($mailData));
        // Mail::to($user->email)->send(new MailUPDATE($mailData));
        // $datenow = date('y-m-d', strtotime(Carbon::now()));

        return redirect()->route('legal.permit.index');
    }
}
