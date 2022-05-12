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
                    'note' => 'required',
                    // 'status' => 'IN PROGRESS'
                ]);
                $data['status'] = 'IN PROGRESS';
                $data['extend'] = 'Ya';

                $item = Permit::findOrFail($id);

                $item->update($data);
                // $user = User::findOrFail($item->user_id);

                return redirect()->route('perpanjangan.prolongation');
                break;
        }
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
}
