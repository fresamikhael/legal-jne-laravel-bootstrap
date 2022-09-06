<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Mail\MailJNE;
use App\Mail\MailUPDATE;
use App\Models\Permit;
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
    public function index()
    {

        $data = Permit::where('user_id', auth()->user()->id)
            ->get();

        return view('pages.user.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,

        ]);
    }
    public function index_prolongation()
    {

        $data = Permit::where('user_id', auth()->user()->id)
            ->get();

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

        Permit::create($data);

        if (auth()->user()->role == 'LEGAL') {
            return redirect()->route('legal.permit.newpermit')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
        } else {
            return redirect()->route('permit.newpermit')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
        }
    }

    public function detail($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.detail', [
            'permit' => $permit
        ]);
    }

    public function edit($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.edit', [
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            // 'user_id' => 'required',
            'permit_type' => 'required',
            'location' => 'required',
            'specification' => 'required',
            'application_reason' => 'required',
            'file_disposition' => 'required',
            'file_document1' => 'required',
            'file_document2' => 'required',
            'file_document3' => 'required',

        ]);
        $data['status'] = 'PENDING';


        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document1')) {
            $file = $request->file('file_document1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document1'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document2')) {
            $file = $request->file('file_document2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document2'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document3')) {
            $file = $request->file('file_document3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document3'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        $item = Permit::where('id', $id)->firstOrFail();

        $item->update([$data, 'status' => 'PENDING']);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => '' . $item->permit_type . 'permit has been sumbitted',
            'body' => 'permit has been sumbitted by ' . auth()->user()->name .  ' '
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailJNE($mailData));

        return redirect()->route('permit.newpermit');
    }

    public function confirm_skpd(Request $request, $id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.confirm_skpd', [
            'data' => $data
        ]);
    }

    public function confirm_skpd_update(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([

            'cost_control' => 'required',
            'note' => 'required'

        ]);


        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'update from user',
            'body' => 'SKPD telah masuk ke Cost control, mohon untuk memonitoring Cost control'
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('permit.newpermit');
    }




    public function index_legal()
    {

        $data = Permit::where('user_id', auth()->user()->id)
            ->get();
        $data2 = Permit::all();
        return view('pages.legal.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,
            'data2' => $data2
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

        Permit::create($data);

        return redirect()->route('legal.permit.newpermit');
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

        Permit::create($data);

        return redirect()->route('legal.permit.prolongation');
    }

    public function check_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.check', [
            'permit' => $permit
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
                $user = User::findOrFail($item->user_id);

                $item->update($data);


                $mailData = [
                    'title' => 'New permit has been rejected',
                    'body' => 'new permit has been rejected by ' . auth()->user()->name .  ' '
                ];

                Mail::to($user->email)->send(new MailUPDATE($mailData));


                return redirect()->route('legal.permit.newpermit');
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
                $user = User::findOrFail($item->user_id);
                $mailData = [
                    'title' => 'New permit has been approve',
                    'body' => 'new permit has been approve by ' . auth()->user()->name .  ' '
                ];

                Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('legal.permit.newpermit');
                break;
        }
    }

    public function detail_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // $check_legal = Permit::query()->where('user_id', auth()->user()->id)->firstOrFail();
        // dd($check_legal);

        return view('pages.legal.permit.perizinan-baru.detail', [
            'permit' => $permit,
            // 'checkLegal' => $check_legal,
        ]);
    }

    public function upload_skpd_legal($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.upload_skpd', [
            'data' => $data
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
            'note' => 'required'

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
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'update from legal',
            'body' => 'legal telah mengupload skpd'
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.permit.newpermit');
    }

    public function confirm_skpd_legal(Request $request, $id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.confirm_skpd', [
            'data' => $data
        ]);
    }

    public function confirm_skpd_update_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([

            'cost_control' => 'required',
            'note' => 'required'

        ]);


        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'update from user',
            'body' => 'SKPD telah masuk ke Cost control, mohon untuk memonitoring Cost control'
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.permit.newpermit');
    }

    public function upload_skpd_invoice_legal($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.upload_skpd_invoice', [
            'data' => $data
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
            'status' => 'required'

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
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'update from legal',
            'body' => 'Permohonan pengajuan
reklame telah selesai, Silahkan download file SKPD sebagai arsip apabila ada
pemeriksaan dari instansi berwenang.
'
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.permit.newpermit');
    }
}
