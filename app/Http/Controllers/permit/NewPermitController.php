<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
// use App\Models\Permit\Permit as PermitPermit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewPermitController extends Controller
{
    public function index()
    {
        $datenow = date('d-M-Y', strtotime(Carbon::now()));
        $dateNow = date('Y-m-d') . ' 00:00:00';
        $check_user = Permit::select('*')
            ->whereDate('created_at', '>=', $dateNow)
            ->count();

        if ($check_user === 0) {
            $no_kasus = 'PRM' . date('dmy') . '0001';
        } else {
            $item = $check_user + 1;
            if ($item < 10) {
                $no_kasus = 'PRM' . date('dmy') . '000' . $item;
            } elseif ($item >= 10 && $item <= 99) {
                $no_kasus = 'PRM' . date('dmy') . '00' . $item;
            } elseif ($item >= 100 && $item <= 999) {
                $no_kasus = 'PRM' . date('dmy') . '0' . $item;
            } elseif ($item >= 1000 && $item <= 9999) {
                $no_kasus = 'PRM' . date('dmy') . $item;
            }
        }
        return view('pages.user.permit.perizinan-baru', [
            'no_kasus' => $no_kasus,
            'datenow' => $datenow
        ]);
    }

    public function store(Request $request)
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
        $data = $request->all();
        var_dump($data);
        $id_permit = $data['id'];

        $name1 = time() . '-' . $request->file('file_disposition')->getClientOriginalName();
        $name2 = time() . '-' . $request->file('file_document1')->getClientOriginalName();
        $name3 = time() . '-' . $request->file('file_document2')->getClientOriginalName();
        $name4 = time() . '-' . $request->file('file_document3')->getClientOriginalName();

        // dd(gmdate("Y-m-d\TH:i:s\Z", time()));

        // $file = public_path('storage/public/permit' . $name1);

        // if (!file_exists($file)) {
        //     return dd($name1);
        // }

        $data['file_disposition'] = $request->file('file_disposition')->storeAs('public/permit', $name1, 'public');
        $data['file_document1'] = $request->file('file_document1')->storeAs('public/permit', $name2, 'public');
        $data['file_document2'] = $request->file('file_document2')->storeAs('public/permit', $name3, 'public');
        $data['file_document3'] = $request->file('file_document3')->storeAs('public/permit', $name4, 'public');

        // $save = new Permit();

        // $save->name = $name1;
        // $save->name = $name2;
        // $save->name = $name3;
        // $save->name = $name4;

        // $save->path = $path1;
        // $save->path = $path2;
        // $save->path = $path3;
        // $save->path = $path4;

        // UploadFile::create($validatedData2);
        Permit::create($data);

        return redirect()->route('home');
    }
}
