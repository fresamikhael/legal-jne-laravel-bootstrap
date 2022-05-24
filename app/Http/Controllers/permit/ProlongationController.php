<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class ProlongationController extends Controller
{
    public function index()
    {

        $data = Permit::where('check_expired', 'TRUE')->where('receipt', null)->get();
        return view('pages.user.permit.perpanjangan.perpanjangan', [
            'data' => $data,
        ]);
    }
    public function detail($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perpanjangan.detail', [
            'permit' => $permit
        ]);
    }

    public function check_perpanjangan($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perpanjangan.check_perpanjangan', [
            'permit' => $permit
        ]);
    }

    // public function check_unxtended($id)
    // {
    //     $permit = Permit::query()->where('id', $id)->firstOrFail();
    //     // dd($permit);

    //     return view('pages.user.permit.perpanjangan.unxtended', [
    //         'permit' => $permit
    //     ]);
    // }


    public function store_check_perpanjangan(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Unextended':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'note' => 'required',
                    // 'status' => 'required'
                ]);

                // $regulation = Regulation::where('id', $id)->firstOrFail();
                // 'status' => 'RETURN'
                $data['user_id'] = auth()->user()->id;
                $data['status'] = 'CLOSED';
                $data['extend'] = 'Tidak';

                $item = Permit::where('id', $id)->firstOrFail();
                // $user = User::findOrFail($item->user_id);

                $item->update($data);



                return redirect()->route('perpanjangan.prolongation');
                break;

            case 'Extended':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'update_photo' => 'required',
                    'note' => 'required',
                    // 'status' => 'IN PROGRESS'
                ]);
                $data['user_id'] = auth()->user()->id;
                $data['status'] = 'IN PROGRESS';
                $data['extend'] = 'Ya';


                if ($request->file('update_photo')) {
                    $file = $request->file('update_photo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::random(40) . '.' . $extension;
                    $data['update_photo'] = 'Permit/' . $filename;
                    $file->move('Permit', $filename);
                }

                $item = Permit::findOrFail($id);

                $item->update($data);
                // $user = User::findOrFail($item->user_id);

                return redirect()->route('perpanjangan.prolongation');
                break;
        }
    }


    public function confirm_skpd(Request $request, $id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perpanjangan.confirm_skpd', [
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
        $data['proof_of_payment'] = '';


        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        // $mailData = [
        //     'title' => 'update from user',
        //     'body' => 'SKPD telah masuk ke Cost control, mohon untuk memonitoring Cost control'
        // ];

        // Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('perpanjangan.prolongation');
    }



    public function index_legal()
    {

        $data = Permit::where('check_expired', 'TRUE')->get();
        return view('pages.legal.permit.perpanjangan.perpanjangan', [
            'data' => $data,
        ]);
    }
    public function detail_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perpanjangan.detail', [
            'permit' => $permit
        ]);
    }

    public function upload_tanda_terima_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);


        return view('pages.legal.permit.perpanjangan.upload_tanda_terima', [
            'data' => $permit
        ]);
    }

    public function store_upload_tanda_terima_legal(Request $request, $id)
    {
        $data = $request->validate([

            'receipt' => 'required',
            'note' => 'required'

        ]);

        $data['legal_id'] = auth()->user()->id;

        if ($request->file('receipt')) {
            $file = $request->file('receipt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['receipt'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        // $mailData = [
        //     'title' => 'update from user',
        //     'body' => 'SKPD telah masuk ke Cost control, mohon untuk memonitoring Cost control'
        // ];

        // Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('perpanjangan.prolongation');
    }

    public function upload_skpd_legal($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perpanjangan.upload_skpd', [
            'data' => $data
        ]);
    }

    public function update_skpd_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([

            'latest_skpd' => 'required',
            'note' => 'required'

        ]);

        $data['cost_control'] = 'FALSE';

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
        // $mailData = [
        //     'title' => 'update from legal',
        //     'body' => 'legal telah mengupload skpd'
        // ];

        // Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.perpanjangan.prolongation');
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

        return redirect()->route('legal.perpanjangan.prolongation');
    }

    public function upload_skpd_invoice_legal($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perpanjangan.upload_skpd_invoice', [
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

        $data['extend'] = null;
        $data['check_expired'] = 'FALSE';



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
        //         $mailData = [
        //             'title' => 'update from legal',
        //             'body' => 'Permohonan pengajuan
        // reklame telah selesai, Silahkan download file SKPD sebagai arsip apabila ada
        // pemeriksaan dari instansi berwenang.
        // '
        //         ];

        //         Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.perpanjangan.prolongation');
    }
}
